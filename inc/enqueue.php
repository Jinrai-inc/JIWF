<?php
/**
 * Stylesheet & script enqueue.
 *
 * @package jiwf-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_enqueue_scripts', 'jiwf_enqueue_assets' );
function jiwf_enqueue_assets() {
	// Google Fonts.
	wp_enqueue_style(
		'jiwf-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&family=Inter:wght@300;400;500;600&family=Shippori+Mincho:wght@400;500;700&family=Zen+Kaku+Gothic+New:wght@300;400;500;700&display=swap',
		array(),
		null
	);

	// Theme stylesheet (style.css is registered for theme metadata; main.css holds the styles).
	wp_enqueue_style(
		'jiwf-main',
		JIWF_THEME_URI . '/assets/css/main.css',
		array( 'jiwf-fonts' ),
		JIWF_THEME_VERSION
	);

	// Theme info stylesheet (required for child theme support).
	wp_enqueue_style(
		'jiwf-style',
		get_stylesheet_uri(),
		array( 'jiwf-main' ),
		JIWF_THEME_VERSION
	);

	wp_enqueue_script(
		'jiwf-main',
		JIWF_THEME_URI . '/assets/js/main.js',
		array(),
		JIWF_THEME_VERSION,
		true
	);
}

/**
 * Preconnect to Google Fonts.
 */
add_action( 'wp_head', 'jiwf_preconnect_fonts', 2 );
function jiwf_preconnect_fonts() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
