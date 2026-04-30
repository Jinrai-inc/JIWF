<?php
/**
 * Block patterns — drop-in editorial sections for the Gutenberg editor.
 *
 * Editors compose pages by inserting these patterns (Block inserter →
 * Patterns → JIWF Academy). Each pattern carries the brand's typography,
 * colors, and spacing; everything below renders standard core blocks so
 * no JS plugin is required.
 *
 * @package jiwf-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', 'jiwf_register_block_pattern_category' );
function jiwf_register_block_pattern_category() {
	if ( function_exists( 'register_block_pattern_category' ) ) {
		register_block_pattern_category( 'jiwf', array(
			'label'       => __( 'JIWF Academy', 'jiwf-academy' ),
			'description' => __( 'Editorial sections for JIWF Academy pages.', 'jiwf-academy' ),
		) );
	}
}

add_action( 'init', 'jiwf_register_block_patterns', 11 );
function jiwf_register_block_patterns() {
	if ( ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	$patterns = array(
		'page-hero'         => __( 'Page hero (eyebrow + title + lead)', 'jiwf-academy' ),
		'statement'         => __( 'Statement (centered editorial copy)', 'jiwf-academy' ),
		'divider'           => __( 'Gold divider with star', 'jiwf-academy' ),
		'mvv'               => __( 'Mission · Vision · Values (3 cards)', 'jiwf-academy' ),
		'philosophy'        => __( 'Philosophy (4 principles, dark)', 'jiwf-academy' ),
		'timeline'          => __( 'Timeline (founding story)', 'jiwf-academy' ),
		'value-strip'       => __( 'Value strip (4 pillars)', 'jiwf-academy' ),
		'story-trio'        => __( 'Story trio (Stillness / Wisdom / Grandeur)', 'jiwf-academy' ),
		'locations-pair'    => __( 'Locations — Japan & India split', 'jiwf-academy' ),
		'locations-preview' => __( 'Locations preview (Fuji + Himalaya cards)', 'jiwf-academy' ),
		'partners'          => __( 'Partners — types + logos', 'jiwf-academy' ),
		'closing-cta'       => __( 'Closing CTA (3 buttons)', 'jiwf-academy' ),
		'contact-meta'      => __( 'Contact — secondary info column', 'jiwf-academy' ),
		'about-starter'     => __( 'About page — starter (full layout)', 'jiwf-academy' ),
		'community-starter' => __( 'Community page — starter (full layout)', 'jiwf-academy' ),
	);

	foreach ( $patterns as $slug => $title ) {
		$file = JIWF_THEME_DIR . '/inc/patterns/' . $slug . '.php';
		if ( ! file_exists( $file ) ) {
			continue;
		}
		$content = include $file;
		register_block_pattern(
			'jiwf/' . $slug,
			array(
				'title'      => $title,
				'categories' => array( 'jiwf' ),
				'content'    => $content,
			)
		);
	}
}
