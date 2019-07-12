<?php

/**
 * Add global timber variables.
 */
function gurim_context($context) {
    $context['blog_name'] = get_bloginfo('name');
    $context['blog_logo'] = wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full');
    $context['background_color'] = get_theme_mod('gurim_background_color');
    $context['secondary_menu_link_color'] = get_theme_mod('gurim_secondary_menu_link_color');
    $context['site'] = new \Timber\Site();
    $context['primary_menu'] = new \Timber\Menu('primary-menu');
    return $context;
}
add_filter('timber/context', 'gurim_context');
