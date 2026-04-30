<?php
/**
 * Helper functions used across templates.
 *
 * @package jiwf-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Read a JIWF post-meta field. Centralised so we can swap storage later.
 */
function jiwf_field( $key, $post_id = null ) {
	$post_id = $post_id ?: get_the_ID();
	if ( ! $post_id ) {
		return '';
	}
	return get_post_meta( $post_id, $key, true );
}

/**
 * Get an image URL by attachment ID with a sensible fallback.
 */
function jiwf_image_url( $attachment_id, $size = 'large', $fallback = '' ) {
	$attachment_id = (int) $attachment_id;
	if ( $attachment_id ) {
		$src = wp_get_attachment_image_url( $attachment_id, $size );
		if ( $src ) {
			return $src;
		}
	}
	return $fallback;
}

/**
 * Theme mod helpers (Customizer settings).
 */
function jiwf_setting( $key, $default = '' ) {
	return get_theme_mod( $key, $default );
}

/**
 * Parse a "LABEL | URL" textarea into an array of pairs.
 */
function jiwf_parse_pairs( $raw ) {
	$out = array();
	if ( ! $raw ) {
		return $out;
	}
	$lines = preg_split( "/\r\n|\n|\r/", $raw );
	foreach ( $lines as $line ) {
		$line = trim( $line );
		if ( $line === '' ) continue;
		$parts = array_map( 'trim', explode( '|', $line, 2 ) );
		if ( count( $parts ) === 2 && $parts[0] !== '' && $parts[1] !== '' ) {
			$out[] = array( 'label' => $parts[0], 'url' => $parts[1] );
		}
	}
	return $out;
}

/**
 * Parse "TIME | TITLE | DESCRIPTION" or "TITLE | DURATION | DESCRIPTION" rows.
 */
function jiwf_parse_rows( $raw, $keys ) {
	$out = array();
	if ( ! $raw ) {
		return $out;
	}
	$lines = preg_split( "/\r\n|\n|\r/", $raw );
	foreach ( $lines as $line ) {
		$line = trim( $line );
		if ( $line === '' ) continue;
		$parts = array_map( 'trim', explode( '|', $line ) );
		$row = array();
		foreach ( $keys as $i => $k ) {
			$row[ $k ] = $parts[ $i ] ?? '';
		}
		$out[] = $row;
	}
	return $out;
}

/**
 * Current site language code.
 */
function jiwf_current_lang() {
	if ( function_exists( 'pll_current_language' ) ) {
		return pll_current_language();
	}
	$locale = get_locale();
	return ( strpos( $locale, 'ja' ) === 0 ) ? 'ja' : 'en';
}

/**
 * Tagline pair (JP / EN) from Customizer.
 */
function jiwf_tagline() {
	return array(
		'jp' => jiwf_setting( 'jiwf_tagline_jp', '智慧を生きる。未来を創る。' ),
		'en' => jiwf_setting( 'jiwf_tagline_en', 'Live the Wisdom. Create the Future.' ),
	);
}

/**
 * Roman numeral helper for chapter / pillar numbers.
 */
function jiwf_roman( $n ) {
	$map = array(
		1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V',
		6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X',
		11 => 'XI', 12 => 'XII', 13 => 'XIII', 14 => 'XIV', 15 => 'XV',
	);
	return $map[ $n ] ?? (string) $n;
}

/**
 * Contact page URL.
 */
function jiwf_contact_url() {
	$page = get_page_by_path( 'contact' );
	return $page ? get_permalink( $page ) : home_url( '/contact/' );
}

/**
 * Brand statement (footer).
 */
function jiwf_brand_statement() {
	return jiwf_setting( 'jiwf_brand_statement', '' )
		?: __( 'A digital campus where wisdom meets leadership — a place for women to live their purpose and shape the future.', 'jiwf-academy' );
}

/**
 * Language switcher (Polylang aware, with text fallback).
 */
function jiwf_language_switcher() {
	if ( function_exists( 'pll_the_languages' ) ) {
		$langs = pll_the_languages( array( 'raw' => 1, 'hide_if_no_translation' => 0 ) );
		echo '<ul class="lang-switch" aria-label="' . esc_attr__( 'Language', 'jiwf-academy' ) . '">';
		foreach ( (array) $langs as $lang ) {
			$cls = $lang['current_lang'] ? ' is-active' : '';
			printf(
				'<li class="lang-switch__item%1$s"><a href="%2$s" hreflang="%3$s" lang="%3$s">%4$s</a></li>',
				esc_attr( $cls ),
				esc_url( $lang['url'] ),
				esc_attr( $lang['slug'] ),
				esc_html( strtoupper( $lang['slug'] ) )
			);
		}
		echo '</ul>';
		return;
	}

	echo '<ul class="lang-switch" aria-label="' . esc_attr__( 'Language', 'jiwf-academy' ) . '">';
	echo '<li class="lang-switch__item is-active"><span>JP</span></li>';
	echo '<li class="lang-switch__item"><span>EN</span></li>';
	echo '</ul>';
}

/**
 * Outline CTA button.
 */
function jiwf_cta_button( $label = null, $url = null, $modifier = '' ) {
	$label = $label ?: __( 'Get in Touch', 'jiwf-academy' );
	$url   = $url ?: jiwf_contact_url();
	$class = 'btn btn--outline' . ( $modifier ? ' ' . $modifier : '' );
	printf( '<a class="%1$s" href="%2$s">%3$s</a>', esc_attr( $class ), esc_url( $url ), esc_html( $label ) );
}

/**
 * Format an event date range from start/end ISO strings.
 */
function jiwf_format_event_date( $start, $end = '' ) {
	if ( ! $start ) return '';
	$start    = str_replace( 'T', ' ', (string) $start );
	$end      = str_replace( 'T', ' ', (string) $end );
	$ts_start = strtotime( $start );
	$ts_end   = $end ? strtotime( $end ) : 0;
	$lang = jiwf_current_lang();
	if ( $lang === 'ja' ) {
		$out = wp_date( 'Y年n月j日', $ts_start );
		if ( $ts_end && wp_date( 'Y-m-d', $ts_end ) !== wp_date( 'Y-m-d', $ts_start ) ) {
			$out .= ' — ' . wp_date( 'n月j日', $ts_end );
		}
	} else {
		$out = wp_date( 'M j, Y', $ts_start );
		if ( $ts_end && wp_date( 'Y-m-d', $ts_end ) !== wp_date( 'Y-m-d', $ts_start ) ) {
			$out .= ' — ' . wp_date( 'M j', $ts_end );
		}
	}
	return $out;
}

/**
 * Theme image asset URL (bundled with the theme).
 */
function jiwf_asset( $rel ) {
	return JIWF_THEME_URI . '/assets/' . ltrim( $rel, '/' );
}

/**
 * Inline SVG icons used in the home value strip.
 * Keeps the page free of icon-font requests.
 */
function jiwf_value_icon_svg( $name ) {
	$svgs = array(
		'lotus' => '<svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 24c-4 0-9-2-11-5 2-1 4-1 6 0M16 24c4 0 9-2 11-5-2-1-4-1-6 0M16 24c-3 0-6-2-7-5 2-1 4-1 5 0M16 24c3 0 6-2 7-5-2-1-4-1-5 0M16 24V10M16 10c-2 1-4 4-4 7M16 10c2 1 4 4 4 7"/></svg>',
		'heart' => '<svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 26C8 21 4 16 4 12a5 5 0 0 1 9-3 5 5 0 0 1 9 3c0 4-4 9-12 14z"/></svg>',
		'globe' => '<svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="16" cy="16" r="11"/><path d="M5 16h22M16 5c3 3 5 7 5 11s-2 8-5 11M16 5c-3 3-5 7-5 11s2 8 5 11"/></svg>',
		'sun'   => '<svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="16" cy="16" r="5"/><path d="M16 4v3M16 25v3M4 16h3M25 16h3M7.5 7.5l2.1 2.1M22.4 22.4l2.1 2.1M7.5 24.5l2.1-2.1M22.4 9.6l2.1-2.1"/></svg>',
		'feather' => '<svg viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 4c-9 1-15 7-15 16 0 4 2 7 2 7l13-13c2-3 2-7 0-10z"/><path d="M9 27l13-13"/></svg>',
	);
	return $svgs[ $name ] ?? '';
}

/**
 * Output Organization JSON-LD on every page.
 */
add_action( 'wp_head', 'jiwf_jsonld_organization', 20 );
function jiwf_jsonld_organization() {
	$logo_id  = get_theme_mod( 'custom_logo' );
	$logo_url = $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : '';
	$social   = array();
	foreach ( jiwf_parse_pairs( jiwf_setting( 'jiwf_social_links' ) ) as $row ) {
		$social[] = $row['url'];
	}

	$data = array(
		'@context' => 'https://schema.org',
		'@type'    => 'EducationalOrganization',
		'name'     => 'JIWF Academy',
		'url'      => home_url( '/' ),
	);
	if ( $logo_url ) $data['logo']   = $logo_url;
	if ( $social )   $data['sameAs'] = $social;

	echo "\n<script type=\"application/ld+json\">" . wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
}
