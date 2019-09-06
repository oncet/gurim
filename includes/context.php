<?php

/**
 * Add global timber variables.
 */
function gurim_context($context) {
    $context['blog_name'] = get_bloginfo('name');
    $context['blog_title'] = wp_title('&raquo;', false, 'right');
    $context['blog_logo'] = wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full');
    $context['background_color'] = get_theme_mod('gurim_background_color', '#fffef6');
    $context['site'] = new \Timber\Site();

    $menus = get_nav_menu_locations();
    $primary_menu = wp_get_nav_menu_object($menus['primary-menu']);
    $secondary_menu = wp_get_nav_menu_object($menus['secondary-menu']);
    $footer_menu = wp_get_nav_menu_object($menus['footer-menu']);
    $context['primary_menu'] = $primary_menu ? new \Timber\Menu($primary_menu->slug) : false;
    $context['secondary_menu'] = $secondary_menu ? new \Timber\Menu($secondary_menu->slug) : false;
    $context['footer_menu'] = $footer_menu ? new \Timber\Menu($footer_menu->slug) : false;

    return $context;
}
add_filter('timber/context', 'gurim_context');
