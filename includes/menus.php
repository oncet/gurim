<?php

/**
 * Register navigation menus.
 */
function gurim_menus() {
    register_nav_menus([
       'primary-menu' => __('Primary menu')
    ]);
    register_nav_menus([
       'footer-menu' => __('Footer menu')
    ]);
}
add_action('init', 'gurim_menus');
