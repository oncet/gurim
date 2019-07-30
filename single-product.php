<?php

$context = Timber::context();

$context['post'] = new Timber\Post();

Timber::render(['single-product.twig'], $context);
