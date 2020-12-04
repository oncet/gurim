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

Timber::render(['archive-product.twig'], $context);
