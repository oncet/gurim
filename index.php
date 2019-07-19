<?php

$context = Timber::context();

$context['products'] = new Timber\PostQuery([
    'post_type' => 'product'
]);

Timber::render(['index.twig'], $context);
