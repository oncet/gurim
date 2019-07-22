<?php

$context = Timber::context();

$context['post'] = new Timber\Post();
$context['thumbnail'] = $context['post']->thumbnail->src('large');

Timber::render(['single-product.twig'], $context);
