<?php

$context = Timber::context();

$context['products'] = new Timber\PostQuery([
    'post_type' => 'product'
]);

$context['products_menu'] = new \Timber\Menu('products-menu');

Timber::render(['archive-product.twig'], $context);
