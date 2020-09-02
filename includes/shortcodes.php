<?php

function highlight( $atts ) {
	['menu' => $menuName] = shortcode_atts( [
		'menu' => null
	], $atts );

	$menu = wp_get_nav_menu_object($menuName);

	$timberMenu = new \Timber\Menu($menu->term_id);

	// print_r($timberMenu->items[0]);
	// print_r($timberMenu->items[0]->name);
	// print_r($timberMenu->items[0]->description);
	return Timber::compile('partials/highlight.twig', [
		'menu' => $timberMenu
	]);
}
add_shortcode( 'gurim-highlight', 'highlight' );
