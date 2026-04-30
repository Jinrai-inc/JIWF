<?php
/**
 * Theme supports, menus, image sizes.
 *
 * @package jiwf-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'after_setup_theme', 'jiwf_theme_setup' );
function jiwf_theme_setup() {
	load_theme_textdomain( 'jiwf-academy', JIWF_THEME_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'jiwf-academy' ),
			'footer'  => __( 'Footer Navigation', 'jiwf-academy' ),
			'legal'   => __( 'Legal Navigation', 'jiwf-academy' ),
		)
	);

	add_image_size( 'jiwf-hero', 2400, 1400, true );
	add_image_size( 'jiwf-card', 800, 600, true );
	add_image_size( 'jiwf-portrait', 600, 800, true );
}

add_filter( 'excerpt_more', function () {
	return ' …';
} );

add_filter( 'excerpt_length', function () {
	return 28;
} );

/**
 * Register the menu locations under their localized labels for the Customizer.
 */
add_action( 'wp_head', 'jiwf_meta_viewport', 1 );
function jiwf_meta_viewport() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">' . "\n";
	echo '<meta name="theme-color" content="#14213D">' . "\n";
}

/**
 * Disable emoji scripts (clean editorial output).
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
