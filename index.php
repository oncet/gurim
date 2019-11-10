<?php

$context = Timber::context();

$context['products'] = new Timber\PostQuery([
    'post_type' => 'product',
    'posts_per_page' => 6,
    'meta_key' => 'featured'
]);

Timber::render(['index.twig'], $context);
