<?php

$context = Timber::context();

$context['products'] = new Timber\PostQuery([
    'post_type' => 'product',
    'posts_per_page' => 4
]);

Timber::render(['index.twig'], $context);
