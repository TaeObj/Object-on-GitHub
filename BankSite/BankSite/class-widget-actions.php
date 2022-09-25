<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!class_exists('Class_Bsite_Widget_Actions')) {


    class Class_Bsite_Widget_Actions {

        /**
         * Class_Bsite_Widget_Actions Instance.
         *
         * @var Class_Bsite_Widget_Actions
         */
        private static $instance;

        private function __construct() {

            add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts_callback'));

            add_action('admin_footer', array($this, 'admin_footer_callback'));

            add_filter('post_row_actions', array($this, 'post_row_actions_callback'), 10, 2);


            add_action('wp_ajax_wp_activate_post', array($this, 'wp_activate_post'));
            add_action('wp_ajax_nopriv_wp_activate_post', array($this, 'wp_activate_post'));

            add_action('wp_ajax_wp_deactivate_post', array($this, 'wp_deactivate_post'));
            add_action('wp_ajax_nopriv_wp_deactivate_post', array($this, 'wp_deactivate_post'));

            add_action('wp', array($this, 'process_pages'));

            add_filter('display_post_states', array($this, 'append_to_post_status'), 10, 2);
        }

        function append_to_post_status($post_states, $post) {
            if (is_admin() && $post->post_type == Bsite_OB_Constants::Bsite_OB_Widget_Post_Type) {
                if (get_post_meta($post->ID, 'is_post_active', true) == 'yes')
                    $post_states[] = '<span class="bsite-online-bank-active">' . __('Active', BSITE_ONLINE_BANKING_TEXT_DOMAIN) . '</span>';
                else
                    $post_states[] = '<span class="bsite-online-bank-inactive">' . __('In Active', BSITE_ONLINE_BANKING_TEXT_DOMAIN) . '</span>';
            }
            return $post_states;
        }

        function admin_enqueue_scripts_callback($hook) {
            global $current_screen;

            if ($current_screen->id == 'edit-' . Bsite_OB_Constants::Bsite_OB_Widget_Post_Type && !empty($current_screen->post_type) && $current_screen->post_type == Bsite_OB_Constants::Bsite_OB_Widget_Post_Type) {
                wp_enqueue_style('bootstrap-css', Bsite_OB_Constants::bsite_ob_get_bk_css_url() . '/bootstrap.css');
                wp_enqueue_script('bootstrap-js', Bsite_OB_Constants::bsite_ob_get_bk_js_url() . '/bootstrap.min.js');
                wp_enqueue_style('bsite-ob-widget-css', Bsite_OB_Constants::bsite_ob_get_bk_css_url() . '/bsite-ob-widget-list.css');

                wp_enqueue_script('bsite-ob-widget-list', Bsite_OB_Constants::bsite_ob_get_bk_js_url() . '/bsite-ob-widget-list.js', array('jquery'));
                wp_localize_script('bsite-ob-widget-list', 'obj', array('ajax_url' => admin_url('admin-ajax.php')));
            }
        }

        function post_row_actions_callback($actions, $post) {
            //check for your post type
            if ($post->post_type == Bsite_OB_Constants::Bsite_OB_Widget_Post_Type) {
                if (!empty($post->ID) && get_post_meta($post->ID, 'is_post_active', true) == 'yes')
                    $actions['in_active'] = '<a href="#" class="post-in-active" data-id ="' . $post->ID . '">' . __('Deactive', BSITE_ONLINE_BANKING_TEXT_DOMAIN) . '</a>';
                else
                    $actions['active'] = '<a href="#" class="post-active" data-id ="' . $post->ID . '">' . __('Active', BSITE_ONLINE_BANKING_TEXT_DOMAIN) . '</a>';

                $actions['wp_preview'] = '<a href="' . trailingslashit(site_url()) . '?wp_page=wp_preview&id=' . $post->ID . '">' . __('WP Preview', BSITE_ONLINE_BANKING_TEXT_DOMAIN) . '</a>';
            }
            return $actions;
        }

        function admin_footer_callback() {

            global $current_screen;

            if ($current_screen->id == 'edit-' . Bsite_OB_Constants::Bsite_OB_Widget_Post_Type) {
                ?>
<!--                post activate modal-->
<div class="modal fade post-active-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo __('Activate Widget', BSITE_ONLINE_BANKING_TEXT_DOMAIN); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&#10005;</button>
            </div>
            <div class="modal-body">
                <p><?php echo __('Are You sure, you want to activate widget', BSITE_ONLINE_BANKING_TEXT_DOMAIN); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-popup " data-bs-dismiss="modal"
                    aria-label="Close"><?php echo __('NO', BSITE_ONLINE_BANKING_TEXT_DOMAIN); ?></button>
                <button type="button"
                    class="btn btn-primary save-post-meta"><?php echo __('Yes', BSITE_ONLINE_BANKING_TEXT_DOMAIN); ?></button>
            </div>
        </div>
    </div>
</div>

<!--            post deactivate modal-->
<div class="modal fade post-deactive-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo __('Deactivate Widget', BSITE_ONLINE_BANKING_TEXT_DOMAIN); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&#10005;</button>
            </div>
            <div class="modal-body">
                <p><?php echo __('Are You sure, you want to deactivate widget', BSITE_ONLINE_BANKING_TEXT_DOMAIN); ?>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-popup " data-bs-dismiss="modal"
                    aria-label="Close"><?php echo __('NO', BSITE_ONLINE_BANKING_TEXT_DOMAIN); ?></button>
                <button type="button"
                    class="btn btn-primary delete-post-meta"><?php echo __('Yes', BSITE_ONLINE_BANKING_TEXT_DOMAIN); ?></button>
            </div>
        </div>
    </div>
</div>
<!--            post trash modal-->
<div class="modal fade post-trash-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo __('Delete Widget', BSITE_ONLINE_BANKING_TEXT_DOMAIN); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&#10005;</button>
            </div>
            <div class="modal-body">
                <p><?php echo __('Are You sure, you want to move widget to trash', BSITE_ONLINE_BANKING_TEXT_DOMAIN); ?>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-popup " data-bs-dismiss="modal"
                    aria-label="Close"><?php echo __('NO', BSITE_ONLINE_BANKING_TEXT_DOMAIN); ?></button>
                <button type="button"
                    class="btn btn-primary delete-post"><?php echo __('Yes', BSITE_ONLINE_BANKING_TEXT_DOMAIN); ?></button>
            </div>
        </div>
    </div>
</div>

<?php
            }
        }

        function wp_activate_post() {
            $data = array();
            if (!empty($_POST['post_id'])) {
                $post_id = esc_attr($_POST['post_id']);
                $args = array(
                    'post_type' => Bsite_OB_Constants::Bsite_OB_Widget_Post_Type,
                    'post_status' => 'any',
                    'meta_query' => array(
                        array(
                            'key' => 'is_post_active',
                            'value' => 'yes',
                            'compare' => '=',
                        ),
                    ),
                );
                $query = new WP_Query($args);
                if (!empty($query->posts)) {
                    foreach ($query->posts as $custom_post) {
                        delete_post_meta($custom_post->ID, 'is_post_active');
                    }
                }

                update_post_meta($post_id, 'is_post_active', 'yes');
                $data['success'] = 'ok';
            }

            wp_send_json($data);
            wp_die();
        }

        function wp_deactivate_post() {
            $data = array();
            if (!empty($_POST['post_id'])) {
                $post_id = esc_attr($_POST['post_id']);
                delete_post_meta($post_id, 'is_post_active');
                $data['success'] = 'ok';
            }

            wp_send_json($data);
            wp_die();
        }

        public function process_pages() {
            if (empty($_GET['wp_page'])) {
                return;
            }

            $page = $_GET['wp_page'];


            switch ($page) {
                case 'wp_preview':
                    require_once( Bsite_OB_Constants::bsite_ob_get_bk_template_path() . '/widget-preview.php' );
                    break;
            }
            exit();
        }

        /**
         * @return Class_Bsite_Widget_Actions
         */
        public static function get_instance() {

            if (null == self::$instance) {
                self::$instance = new self;
            }
            return self::$instance;
        }

    }

    Class_Bsite_Widget_Actions::get_instance();
}