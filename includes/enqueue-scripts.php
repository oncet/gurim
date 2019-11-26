<?php

/**
 * Enqueue styles and scripts.
 */
function gurim_styles_and_scripts() {
    wp_enqueue_style('gurim', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script('secondary-menu', get_template_directory_uri() . '/js/secondary-menu.js');
}
add_action('wp_enqueue_scripts', 'gurim_styles_and_scripts');
