<?php

require_once( __DIR__ . '/includes/dependency-checks.php');
require_once( __DIR__ . '/includes/features.php');
require_once( __DIR__ . '/includes/custom-post-types.php');
require_once( __DIR__ . '/includes/customizable-options.php');
require_once( __DIR__ . '/includes/menus.php');
require_once( __DIR__ . '/includes/context.php');
require_once( __DIR__ . '/includes/enqueue-scripts.php');

add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );
function add_current_nav_class($classes, $item) {
    // Getting the current post details
    global $post;

    if (!$post) {
        return $classes;
    }

    // Getting the post type of the current post
    $current_post_type = get_post_type_object(get_post_type($post->ID));
    $current_post_type_slug = $current_post_type->rewrite['slug'];

    // Getting the URL of the menu item
    $menu_slug = strtolower(trim($item->url));

    // If the menu item URL contains the current post types slug add the current-menu-item class
    if ($current_post_type_slug && strpos($menu_slug, $current_post_type_slug) !== false) {
       $classes[] = 'active';
    }

    // Return the corrected set of classes to be added to the menu item
    return $classes;
}

add_action('parse_query', 'add_custom_post_types');
function add_custom_post_types() {
    if( is_category() && !is_admin() ) {
        set_query_var( 'post_type', ['post', 'product'] );
    }
    return;
}
