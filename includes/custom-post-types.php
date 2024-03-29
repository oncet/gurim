<?php

/**
 * Register custom post type.
 */
if(!post_type_exists('product')) {
    add_action('init', function() {
        register_post_type('product', [
            'show_ui' => true,
            'public' => true,
            'has_archive' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'product',
            'graphql_plural_name' => 'products',
            'show_in_rest' => true,
            'supports' => [
                'title',
                'editor',
                'thumbnail',
                'revisions',
                'custom-fields'
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
