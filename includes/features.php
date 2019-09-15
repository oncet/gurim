<?php

/**
 * Enable theme features.
 */
add_theme_support('post-thumbnails');
add_theme_support('custom-logo');
add_theme_support('custom-background', ['default-color' => 'fffef6']);

if(!get_option('medium_crop')) {
    add_option('medium_crop', '1');
} else {
    update_option('medium_crop', '1');
}
