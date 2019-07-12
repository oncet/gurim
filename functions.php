<?php

/**
 * Enable theme features.
 */
add_theme_support('post-thumbnails');
add_theme_support('custom-logo');

/**
 * Show an error message if the Timber plugin is not installed.
 */
if(!class_exists('Timber')) {
    add_action('admin_notices', function() {
        printf('<div class="error"><p>This theme requires the <a href="%s/wp-admin/plugin-install.php?s=timber&tab=search&type=term">Timber</a> plugin.</p></div>', get_site_url());
    });
    return;
}

/**
 * Register custom post type.
 */
if(!post_type_exists('gurim_product')) {
    add_action('init', function() {
        register_post_type('gurim_product', [
            'show_ui' => true,
            'supports' => [
                'title',
                'editor',
                'thumbnail'
            ],
            'menu_position' => 2,
            'taxonomies' => [
                'category',
                'post_tag'
            ],
            'labels' => [
                'name' => __('Products'),
                'singular' => __('Product'),
                'add_new_item' => __('Add New Product'),
                'edit_item' => __('Edit Product'),
                'new_item' => __(' New Product'),
                'view_item' => __('View Product'),
                'view_items' => __('View Products'),
                'search_items' => __('Search Products'),
                'not_found' => __('No products found'),
                'not_found_in_trash' => __('No products found in Trash'),
                'all_items' => __('All Products'),
                'archives' => __('Products Archives'),
                'attributes' => __('Products Attributes'),
                'insert_into_item' => __('Insert into product'),
                'uploaded_to_this_item' => __('Uploaded to this product'),
                'filter_items_list' => __('Filter products list'),
                'items_list' => __('Products list'),
                'item_published' => __('Product published.'),
                'item_published_privately' => __('Product published privately.'),
                'item_reverted_to_draft' => __('Product reverted to draft.'),
                'item_scheduled' => __('Product scheduled.'),
                'item_updated' => __('Product updated.')
            ]
        ]);
    });
}

/**
 * Remove default attachments instance and register a custom one.
 */
add_filter('attachments_default_instance', '__return_false');

function gurim_attachments($attachments) {
  $attachments->register( 'gurim_attachments', [
    'post_type' => ['product'],
    'position' => 'side',
    'priority' => 'high',
    'filetype' => 'image',
    'append' => false,
    'button_text' => __( 'Attach Files', 'attachments' ),
    'modal_text' => __( 'Attach', 'attachments' ),
    'router' => 'upload',
    'fields' => []
  ]);
}
add_action('attachments_register', 'gurim_attachments');

/**
 * Register navigation menus.
 */
function gurim_menus() {
    register_nav_menus([
       'primary-menu' => __('Primary menu')
    ]);
    register_nav_menus([
       'secondary-menu' => __('Secondary menu')
    ]);
}
add_action('init', 'gurim_menus');

/**
 * Add global timber variables.
 */
function gurim_context($context) {
    $context['blog_name'] = get_bloginfo('name');
    $context['blog_logo'] = wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full');
    $context['background_color'] = get_theme_mod('gurim_background_color');
    $context['secondary_menu_link_color'] = get_theme_mod('gurim_secondary_menu_link_color');
    $context['site'] = new \Timber\Site();
    $context['primary_menu'] = new \Timber\Menu('primary-menu');
    return $context;
}
add_filter('timber/context', 'gurim_context');

/**
 * Enqueue styles and scripts.
 */
function gurim_styles_and_scripts() {
    wp_enqueue_style('gurim', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');
}
add_action('wp_enqueue_scripts', 'gurim_styles_and_scripts');

/**
 * Add customizable options.
 */
function gurim_customize_register($wp_customize) {
    $wp_customize->add_setting('gurim_background_color', [ 'default' => '#fffef6' ]);

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'gurim_background',
        [
            'settings'  => 'gurim_background_color',
            'label'     => 'Background',
            'section'   => 'colors'
        ]
    ));

    $wp_customize->add_setting('gurim_secondary_menu_link_color', [ 'default' => '#636363' ]);

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'gurim_secondary_menu_link',
        [
            'settings'  => 'gurim_secondary_menu_link_color',
            'label'     => 'Secondary menu link',
            'section'   => 'colors'
        ]
    ));
}
add_action('customize_register', 'gurim_customize_register');
