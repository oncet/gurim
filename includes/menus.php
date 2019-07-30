<?php

/**
 * Register navigation menus.
 */
function gurim_menus() {
    register_nav_menus([
       'primary-menu' => __('Primary menu')
    ]);
    register_nav_menus([
       'secondary-menu' => __('Secondary menu')
    ]);
    register_nav_menus([
       'products-menu' => __('Products menu')
    ]);
}
add_action('init', 'gurim_menus');
