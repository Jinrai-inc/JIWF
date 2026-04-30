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
 * Get the current site language code (uses Polylang if available).
 */
function jiwf_current_lang() {
	if ( function_exists( 'pll_current_language' ) ) {
		return pll_current_language();
	}
	$locale = get_locale();
	return ( strpos( $locale, 'ja' ) === 0 ) ? 'ja' : 'en';
}

/**
 * Translate a short string using Polylang where available, falling back to the
 * provided default.
 *
 * @param string $key     Polylang string key.
 * @param string $default Default copy.
 */
function jiwf_t( $key, $default = '' ) {
	if ( function_exists( 'pll__' ) ) {
		$value = pll__( $key );
		if ( $value && $value !== $key ) {
			return $value;
		}
	}
	return $default !== '' ? $default : $key;
}

/**
 * Lang-aware tagline pair (JP / EN).
 */
function jiwf_tagline() {
	return array(
		'jp' => get_theme_mod( 'jiwf_tagline_jp', '智慧を生き、未来を創る。' ),
		'en' => get_theme_mod( 'jiwf_tagline_en', 'Live the Wisdom. Create the Future.' ),
	);
}

/**
 * Roman numeral helper for chapter / pillar numbers.
 *
 * @param int $n 1..20
 */
function jiwf_roman( $n ) {
	$map = array(
		1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V',
		6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X',
		11 => 'XI', 12 => 'XII', 13 => 'XIII', 14 => 'XIV', 15 => 'XV',
		16 => 'XVI', 17 => 'XVII', 18 => 'XVIII', 19 => 'XIX', 20 => 'XX',
	);
	return $map[ $n ] ?? (string) $n;
}

/**
 * URL of the contact page (works whether the slug is `contact` or translated).
 */
function jiwf_contact_url() {
	$page = get_page_by_path( 'contact' );
	if ( $page ) {
		return get_permalink( $page );
	}
	return home_url( '/contact/' );
}

/**
 * Output the language switcher (Polylang aware, with text fallback).
 */
function jiwf_language_switcher() {
	if ( function_exists( 'pll_the_languages' ) ) {
		$langs = pll_the_languages( array(
			'raw'        => 1,
			'hide_if_no_translation' => 0,
		) );
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
 * Output the "Get in Touch" outline button used in the header.
 */
function jiwf_cta_button( $label = null, $url = null, $modifier = '' ) {
	$label = $label ?: jiwf_t( 'cta_get_in_touch', 'Get in Touch' );
	$url   = $url ?: jiwf_contact_url();
	$class = 'btn btn--outline' . ( $modifier ? ' ' . $modifier : '' );
	printf(
		'<a class="%1$s" href="%2$s">%3$s</a>',
		esc_attr( $class ),
		esc_url( $url ),
		esc_html( $label )
	);
}

/**
 * Brand statement (footer). Reads from ACF Site Settings if available.
 */
function jiwf_brand_statement() {
	if ( function_exists( 'get_field' ) ) {
		$statement = get_field( 'brand_statement', 'option' );
		if ( $statement ) {
			return $statement;
		}
	}
	return jiwf_t(
		'brand_statement',
		'JIWF Academy is a digital campus where wisdom meets leadership — a place for women to live their purpose and shape the future.'
	);
}

/**
 * Format an event date range from start/end ISO strings.
 */
function jiwf_format_event_date( $start, $end = '' ) {
	if ( ! $start ) {
		return '';
	}
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
 * Output Organization JSON-LD on every page.
 */
add_action( 'wp_head', 'jiwf_jsonld_organization', 20 );
function jiwf_jsonld_organization() {
	$data = array(
		'@context' => 'https://schema.org',
		'@type'    => 'EducationalOrganization',
		'name'     => 'JIWF Academy',
		'url'      => home_url( '/' ),
		'logo'     => function_exists( 'get_field' ) ? esc_url( wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) ) : '',
		'sameAs'   => array(),
	);
	echo "\n<script type=\"application/ld+json\">" . wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
}
