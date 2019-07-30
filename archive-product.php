<?php

$context = Timber::context();

$context['products'] = new Timber\PostQuery([
    'post_type' => 'product'
]);

$menus = get_nav_menu_locations();
$menu = wp_get_nav_menu_object($menus['products-menu']);

$context['products_menu'] = $menu ? new \Timber\Menu($menu->slug) : false;

Timber::render(['archive-product.twig'], $context);
