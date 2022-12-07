<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.1' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );
        
        if(function_exists('is_product') && is_product()){
            wp_enqueue_script('seco-product-script', get_stylesheet_directory_uri() . '/assets/js/product-script.js', array('jquery'), CHILD_THEME_ASTRA_CHILD_VERSION, true);
        }
        
        if(function_exists('is_search') && is_search()){
            wp_enqueue_script('seco-search-script', get_stylesheet_directory_uri() . '/assets/js/search-script.js', array('jquery'), CHILD_THEME_ASTRA_CHILD_VERSION, true);
        }

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 500 );

add_action( 'woocommerce_single_product_summary', 'display_product_sku_below_title', 5 );
function display_product_sku_below_title() {
    global $product;

    if ( $sku = $product->get_sku() ) {
        echo '<p class="product_sku">' . esc_html( $sku ) . '</p>';
    }
}

/**
 * WpExperts
 */
add_action('astra_woo_shop_title_before', 'seco_add_sku_before_title', 20);
//add_action('woocommerce_after_shop_loop_item_title', 'seco_add_sku_before_title', 50);

function seco_add_sku_before_title(){
    global $product;
    
    echo '<span class="seco_product_cat">'.seco_get_product_category_list($product->get_id()).'</span>';
    echo '<span class="seco_product_sku">'.$product->get_sku().'</span>';
}

add_filter('loop_shop_columns', 'seco_loop_columns', 999);

function seco_loop_columns() {
    return 4;
}

function seco_get_product_category_list( $id = null, $taxonomy = 'product_cat', $limit = 1 ) { 
    $terms = get_the_terms( $id, $taxonomy );
    $i = 0;
    if ( is_wp_error( $terms ) )
        return $terms;

    if ( empty( $terms ) )
        return false;
    $links = '';
    foreach ( $terms as $term ) {
        $i++;
        $link = get_term_link( $term, $taxonomy );
        if ( is_wp_error( $link ) ) {
            return $link;
        }
        $links .= '<a href="' . esc_url( $link ) . '">' . $term->name . '</a>';
        if( $i == $limit ){
            return $links;
        }else{ continue; }
    }
    
}

add_filter('woocommerce_subcategory_count_html', 'seco_remove_category_count', 99, 2);

function seco_remove_category_count($count, $category){
	return '';
}

/** 
 * Filer WooCommerce Flexslider options - Add Navigation Arrows
 */
add_filter( 'woocommerce_single_product_carousel_options', 'seco_update_woo_flexslider_options' );

function seco_update_woo_flexslider_options( $options ) {

    $options['directionNav'] = true;

    return $options;
}

add_shortcode('seco_single_compare', 'seco_single_compare_callback');

function seco_single_compare_callback($atts) {
    ob_start();
    $html = '';

    if(class_exists('WC_Products_Compare_Frontend')){
        global $post;
        
        $products = WC_Products_Compare_Frontend::get_compared_products(); // Comma delimited string.

        // List exists.
        if ( $products && is_array( $products ) && in_array( (int) $post->ID, $products, true ) ) {
            $check = true;
        } else {
            $check = false;
        }

        $checked = checked( $check, true, false );
        $html    .= '<p class="woocommerce-products-compare-compare-button"><label for="woocommerce-products-compare-checkbox-' . esc_attr( $post->ID ) . '"><input type="checkbox" class="woocommerce-products-compare-checkbox" data-product-id="' . esc_attr( $post->ID ) . '" ' . $checked . ' id="woocommerce-products-compare-checkbox-' . esc_attr( $post->ID ) . '" />&nbsp;' . esc_html__( 'Compare', 'woocommerce-products-compare' ) . '</label> <a href="' . esc_url( get_home_url() . '/' . apply_filters( 'woocommerce_products_compare_end_point', 'products-compare' ) ) . '" title="' . esc_attr__( 'Compare Page', 'woocommerce-products-compare' ) . '" class="woocommerce-products-compare-compare-link"><span class="dashicons dashicons-external"></span></a></p>';

        $html = apply_filters( 'woocommerce_products_compare_compare_button', $html, $post->ID, $checked );
    }

    ob_end_clean();

    return $html;
}

add_shortcode('product_icons', 'seco_dispaly_product_icons');

function seco_dispaly_product_icons($atts){
    ob_start();
    
    $args = shortcode_atts(array(
        '' => ''
            ), $atts);
    
    global $post;
    
    if(function_exists('get_field')){
        $rows = get_field('icons', $post->ID);
        if($rows) {
            ?>
            <ul class="seco_icons">
            <?php
            foreach( $rows as $row ) {
                $image = $row['icon'];
                ?>
                <li><img src="<?php echo $image; ?>" alt="product_icon"/></li>
                <?php
            }
            ?>
            </ul>
            <?php
        }
    }
    
    return ob_get_clean();
}

add_shortcode('product_accessories', 'seco_dispaly_product_accessories');

function seco_dispaly_product_accessories($atts){
    ob_start();
    $html = '';
    $args = shortcode_atts(array(
        '' => ''
            ), $atts);
    
    global $post;
    
    if(function_exists('get_field')){
        $rows = get_field('accessories', $post->ID);
        if($rows) {
            $ids = array();
            foreach( $rows as $row ) {
                $ids[] = $row['accessory'];
            }
            
            if(count($ids)){
                $ids_str = implode(',', $ids);
                $html .= do_shortcode('[products ids="'.$ids_str.'" orderby="id" columns="4" order="ASC" class="seco_product_accessories"]');
            }
        }
    }
	
    ob_end_clean();
    
    return $html;
}

add_action('woocommerce_before_shop_loop_item_title', 'seco_show_product_loop_discontinued_flash', 10);

function seco_show_product_loop_discontinued_flash(){
    global $post;
    
    if(has_term('discontinued', 'product_cat', $post)){
        echo '<span class="seco_discontinued">' . esc_html__( 'Discontinued', 'woocommerce' ) . '</span>';
    }
}

add_filter('subcategory_archive_thumbnail_size', function ($size){
    return 'large';
});

add_filter('single_product_archive_thumbnail_size', function ($size){
    return 'large';
});

add_filter('woocommerce_gallery_image_html_attachment_image_params', 'seco_remove_title_from_image');

function seco_remove_title_from_image($params){
    if(isset($params['title'])){
        unset($params['title']);
    }
    
    return $params;
}

add_filter( 'loop_shop_per_page', 'seco_loop_shop_per_page', 50 );

function seco_loop_shop_per_page($products) {
 //$products = 12;
    if(isset($_COOKIE['seco_ppp']) && $_COOKIE['seco_ppp']){
        $per_page = (int) $_COOKIE['seco_ppp'];
    }elseif(isset($_GET['per_page']) && $_GET['per_page']){
        $per_page = (int) $_GET['per_page'];
    }else{
        $per_page = 12;
    }
 return $per_page;
}

add_action('init', 'seco_set_ppp_cookie');

function seco_set_ppp_cookie(){
    if(isset($_GET['per_page']) && $_GET['per_page']){
        $value = $_GET['per_page'];
        if(isset($_COOKIE['seco_ppp']) && $_COOKIE['seco_ppp']){
            if($_COOKIE['seco_ppp'] != $value){
                setcookie('seco_ppp', $value, time()+60*60*24*30, '/');
            }
        }else{
            setcookie('seco_ppp', $value, time()+60*60*24*30, '/');
        }
    }
}

add_filter('body_class', 'seco_add_layout_class', 50 );
function seco_add_layout_class($classes) {
    if(is_product_category() || is_search()){
        if (wp_is_mobile()) {
            $classes[] = 'seco_list_layout';
        }elseif(isset($_GET['layout']) && $_GET['layout'] == 'list'){
            $classes[] = 'seco_list_layout';
        }
    }
    
    if(is_product_category()){
        $category = get_queried_object();
        if($category && count(get_term_children($category->term_id, 'product_cat'))){
            $classes[] = 'archive-no-filter';
        }
    }
    
    return $classes;
}

add_action('wp', 'seco_remove_image_zoom_support', 100);
function seco_remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
}

add_filter('woocommerce_related_products', 'seco_remove_dicontinued_products_from_related', 50, 2);
function seco_remove_dicontinued_products_from_related($related_products, $product_id){
    $final = array();
    
    foreach($related_products as $related_product){
        if(!has_term('discontinued', 'product_cat', $related_product)){
            $final[] = $related_product;
        }
    }
    
    return $final;
}

add_filter('yith_woocompare_standard_fields_array', 'seco_change_sku_label', 20, 1);
function seco_change_sku_label($fields){
    if(isset($fields['sku']) && $fields['sku']){
        $fields['sku'] = __('Model Number', 'yith-woocommerce-compare');
    }
    
    return $fields;
}
if( ! function_exists( 'yith_wcan_change_base_url' ) ){
	function yith_wcan_change_base_url( $params ){
		$base_url= wc_get_page_permalink( 'shop' );
		return $base_url;
	}
	add_filter( 'yith_wcan_base_url', 'yith_wcan_change_base_url' );
}