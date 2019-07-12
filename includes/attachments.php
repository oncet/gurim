<?php

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
