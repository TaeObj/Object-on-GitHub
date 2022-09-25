<?php

class OMS_Generate_MPFD {

    public function __construct() {
        add_action('add_meta_boxes', array($this, 'add_mpdf_signature_metabox_in_admin_order'), 10, 2);
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
        add_action('wp_ajax_export_pdf_in_order', array($this, 'export_pdf_in_order'));
        add_action('wp_ajax_delete_pdf_in_order', array($this, 'delete_pdf_in_order'));
    }

    public function add_mpdf_signature_metabox_in_admin_order() {
        add_meta_box('oms-mpdf', __('Export PDF', 'zain-oms'), array($this, 'display_oms_pdf_metabox'), 'shop_order', 'side', 'default');
    }

    public function display_oms_pdf_metabox($order_id) {
        ?>
        <button type="button" class="oms-mpdf-export" id="GetFile">Get File!</button>
                <!--<a href="javascript.void(0)" name="oms_mpdf_export" class="oms-mpdf-export"><?php _e('Download', 'zain-oms'); ?>"</a>-->
        <?php
    }

    public function enqueue_admin_scripts() {
        global $post;
        if (isset($post) && $post->post_type == 'shop_order') {
            $exported_post_id = 3951;
//            $exported_post_id=3935;
            wp_enqueue_script('oms-mpdf-signature', ZAIN_OMS_URL . 'assets/js/pdf-signature/mpdf-export.js', array('jquery'));
            $loalized_data = array(
                'exported_post_id' => $exported_post_id,
                'order_id' => $post->ID
            );
            wp_localize_script('oms-mpdf-signature', 'oms_mpdf_exported_order_data', $loalized_data);
        }
    }

    public function export_pdf_in_order() {
        if (isset($_POST['action']) && $_POST['action'] == 'export_pdf_in_order') {
            include 'mpdf-development/vendor/autoload.php';

            ob_start();
            $mpdf = new \Mpdf\Mpdf();
            $stylesheet = file_get_contents(ZAIN_OMS_URL . 'assets/css/pdf-signature/zain-pdf.css');
            $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
            $user_id = get_post_meta($_POST['order_id'], '_customer_user', true);
            $customer = new WC_Customer($user_id);
            $username = $customer->get_billing_first_name() ? $customer->get_billing_first_name() : $customer->get_shipping_first_name();


            $page_id_ar = $_POST['page_id'];
            $page_id_en = icl_object_id($page_id_ar, 'page', false, 'en');
            $content_post_ar = get_post($page_id_ar);
            $content_ar = $content_post_ar->post_content;
            $content_post_en = get_post($page_id_en);
            $content_en = $content_post_en->post_content;
            $sig_obj = new Custom_WOO_Signature();
            $user_signature_data = $sig_obj->get_image_signature($_POST['order_id']);
            $user_signature = '';
            if (isset($user_signature_data) && !empty($user_signature_data['data'])) {
                $user_signature = '<img src="data:image/png;base64,' . base64_encode($user_signature_data['data']) . '" alt="image 1" />';
            }

            $mpdf->SetDirectionality('rtl');
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            if ($content_post_ar) {
                $title_ar = get_the_title($page_id_ar);
                $logo_ar = has_post_thumbnail($page_id_ar) ? get_the_post_thumbnail_url($page_id_ar) : false;
                $logo_ar_image = $logo_ar ? '<td><img src="' . $logo_ar . '" class="oms-pdf-logo" alt="Zain" ></td>' : '';
                $mpdf->WriteHTML('
                    <table class="page-title ar-heading">
                      <tr>
                        <th><h1>' . $title_ar . '</h1></th>
                        ' . $logo_ar_image . '
                     </tr>
                    </table>'
                );

                if (!empty($content_ar)) {
                    $mpdf->WriteHTML($content_ar, \Mpdf\HTMLParserMode::HTML_BODY);
                }


                $mpdf->WriteHTML('   
                      <div class="pdf-wrapper ar-wrapper">

                <div class="sig-block">
                    <div class="name">اسم العميل ' . $username . '</div>
                     <div class="sig">توقيع العميل' . $user_signature . '</div>
                </div></div>');
                $mpdf->AddPage();
            }
            if ($content_post_en) {
               $title_en = get_the_title($page_id_en);
                $logo_en = has_post_thumbnail($page_id_en) ? get_the_post_thumbnail_url($page_id_en) : false;
                $logo_en_image = $logo_en ? '<td><img src="' . $logo_en . '" class="oms-pdf-logo" alt="Zain" ></td>' : '';
                $mpdf->WriteHTML('
                    <table class="page-title en-heading">
                      <tr>
                        <th><h1>' . $title_en . '</h1></th>
                        ' . $logo_en_image . '
                     </tr>
                    </table>'
                );
                if (!empty($content_en)) {
                    $mpdf->WriteHTML($content_en, \Mpdf\HTMLParserMode::HTML_BODY);
                }


                $mpdf->WriteHTML('  
                                          <div class="pdf-wrapper en-wrapper">

                <div class="sig-block">
                    <div class="name">Customer Name  ' . $username . '</div>
                     <div class="sig">Customer Signature' . $user_signature . '</div>
                </div></div>');
            }
            $upload_dir = wp_upload_dir();
            $oms_file_url = $upload_dir['baseurl'] . '/oms-pdf/order-' . $_POST["order_id"] . '.pdf';
            $oms_file_dir = $upload_dir['basedir'] . '/oms-pdf/order-' . $_POST["order_id"] . '.pdf';
            $mpdf->Output($oms_file_dir, \Mpdf\Output\Destination::FILE);
            echo $oms_file_url;
        }
        wp_die();
    }

    public function delete_pdf_in_order() {
        if (isset($_POST['action']) && $_POST['action'] == 'delete_pdf_in_order') {
            $upload_dir = wp_upload_dir();
            $oms_file_dir = $upload_dir['basedir'] . '/oms-pdf/order-' . $_POST["order_id"] . '.pdf';
            wp_delete_file($oms_file_dir);
        }
        wp_die();
    }

}

new OMS_Generate_MPFD();
