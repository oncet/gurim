<?php

$context = Timber::context();

$context['secondary_menu'] = new \Timber\Menu('secondary-menu');

$context['products'] = new Timber\PostQuery([
    'post_type' => 'product'
]);

Timber::render(['index.twig'], $context);
