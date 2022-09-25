<?php

/*** Child Theme Function  ***/

if (!function_exists('ultima_qodef_child_theme_enqueue_scripts')) {
    function ultima_qodef_child_theme_enqueue_scripts()
    {
        $parent_style = 'ultima-qodef-default-style';

        wp_enqueue_style('ultima-qodef-child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
        wp_enqueue_style('caviih-style', get_stylesheet_directory_uri() . '/assets/css/custom-style.css', array($parent_style));
        wp_enqueue_style('caviih-gallery', get_stylesheet_directory_uri() . '/assets/css/home-gallery.css', array($parent_style));

    }

    add_action('wp_enqueue_scripts', 'ultima_qodef_child_theme_enqueue_scripts');
}

add_filter('use_widgets_block_editor', '__return_false');

function cav_gallery()
{
    ob_start();
    include get_stylesheet_directory() . '/shortcodes/cav-gallery.php';
    return ob_get_clean();
}
add_shortcode('caviish-gallery', 'cav_gallery');