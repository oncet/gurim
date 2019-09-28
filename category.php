<?php

$context = Timber::context();

$context['category'] = get_cat_name(get_query_var('cat'));

global $paged;

if (!isset($paged) || !$paged){
    $paged = 1;
}

$context['products'] = new Timber\PostQuery([
    'post_type' => 'product',
    'posts_per_page' => get_option('posts_per_page'),
    'paged' => $paged,
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field' => 'category_id',
            'terms' => get_query_var('cat')
        ]
    ]
]);

Timber::render(['category.twig'], $context);
