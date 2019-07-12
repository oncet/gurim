<?php

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
