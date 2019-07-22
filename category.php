<?php

$context = Timber::context();

$context['products'] = new Timber\PostQuery([
    'post_type' => 'product',
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field' => 'category_id',
            'terms' => get_query_var('cat')
        ]
    ]
]);

$context['category'] = get_cat_name(get_query_var('cat'));

Timber::render(['category.twig'], $context);
