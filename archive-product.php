<?php

$context = Timber::context();

global $paged;
if (!isset($paged) || !$paged){
    $paged = 1;
}

$context['products'] = new Timber\PostQuery([
    'post_type' => 'product',
    'posts_per_page' => get_option('posts_per_page'),
    'paged' => $paged
]);

$menus = get_nav_menu_locations();
$menu = wp_get_nav_menu_object($menus['products-menu']);

$context['products_menu'] = $menu ? new \Timber\Menu($menu->slug) : false;

Timber::render(['archive-product.twig'], $context);
