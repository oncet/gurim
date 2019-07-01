<?php

$context = Timber::context();

$context['posts'] = new Timber\PostQuery();
$context['secondary_menu'] = new \Timber\Menu('secondary-menu');

Timber::render(['index.twig'], $context);
