<?php
/**
 * Native bilingual (JP / EN) without plugins.
 *
 * If Polylang is installed it takes over (jiwf_current_lang and the
 * switcher both delegate). Otherwise:
 *
 *  - The active language is read from ?lang=ja|en, persisted in a
 *    short-lived cookie (`jiwf_lang`), and defaults to 'ja'.
 *  - Any post (page, program, event, faculty, partner, location, etc.)
 *    can be paired with its translation via a "Translations" meta box.
 *  - The language switcher links to the paired post; when no pair is
 *    set it falls back to the language-specific home.
 *  - <html lang> updates to match. Editorial templates already pivot on
 *    jiwf_current_lang() so copy & fonts swap automatically.
 *
 * @package jiwf-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const JIWF_I18N_COOKIE = 'jiwf_lang';
const JIWF_I18N_DEFAULT = 'ja';
const JIWF_I18N_LANGS  = array( 'ja', 'en' );

/**
 * Resolve and persist the active language.
 * Priority: Polylang → ?lang= → cookie → default.
 */
function jiwf_resolve_language() {
	if ( function_exists( 'pll_current_language' ) ) {
		$pll = pll_current_language();
		if ( $pll ) return $pll;
	}

	$candidate = '';
	if ( isset( $_GET['lang'] ) ) {
		$candidate = sanitize_key( wp_unslash( $_GET['lang'] ) );
	} elseif ( isset( $_COOKIE[ JIWF_I18N_COOKIE ] ) ) {
		$candidate = sanitize_key( wp_unslash( $_COOKIE[ JIWF_I18N_COOKIE ] ) );
	}

	if ( ! in_array( $candidate, JIWF_I18N_LANGS, true ) ) {
		$candidate = JIWF_I18N_DEFAULT;
	}

	return $candidate;
}

/**
 * Persist the language choice via cookie when ?lang= is in the URL.
 */
add_action( 'init', 'jiwf_persist_language' );
function jiwf_persist_language() {
	if ( ! isset( $_GET['lang'] ) || headers_sent() ) return;
	$lang = sanitize_key( wp_unslash( $_GET['lang'] ) );
	if ( ! in_array( $lang, JIWF_I18N_LANGS, true ) ) return;
	setcookie( JIWF_I18N_COOKIE, $lang, time() + YEAR_IN_SECONDS, COOKIEPATH ?: '/', COOKIE_DOMAIN, is_ssl(), true );
	$_COOKIE[ JIWF_I18N_COOKIE ] = $lang;
}

/**
 * Tell caches the response varies by cookie so different visitors with
 * different language choices don't poison each other's cached HTML.
 */
add_action( 'send_headers', 'jiwf_send_vary_header' );
function jiwf_send_vary_header() {
	if ( is_admin() ) return;
	header( 'Vary: Cookie', false );
}

/**
 * Output the correct <html lang> attribute.
 */
add_filter( 'language_attributes', 'jiwf_filter_language_attributes' );
function jiwf_filter_language_attributes( $output ) {
	$lang = jiwf_current_lang();
	if ( $lang === 'en' ) {
		$output = preg_replace( '/lang="[^"]*"/', 'lang="en-US"', $output );
	} elseif ( $lang === 'ja' ) {
		$output = preg_replace( '/lang="[^"]*"/', 'lang="ja"', $output );
	}
	return $output;
}

/**
 * Append ?lang= to a URL while preserving existing query args.
 * Always includes the param so an explicit user choice overrides any
 * stale cookie.
 */
function jiwf_url_with_lang( $url, $lang ) {
	if ( ! in_array( $lang, JIWF_I18N_LANGS, true ) ) return $url;
	return add_query_arg( 'lang', $lang, $url );
}

/**
 * Resolve the paired post ID for a given post.
 */
function jiwf_translation_id( $post_id, $lang ) {
	$post_id = (int) $post_id;
	if ( ! $post_id ) return 0;
	$pair_id = (int) get_post_meta( $post_id, '_jiwf_translation_' . $lang, true );
	return $pair_id;
}

/**
 * Best-effort URL of the current page in the requested language.
 */
function jiwf_current_url_in_lang( $lang ) {
	$post_id = get_queried_object_id();

	// Try direct translation pair.
	if ( $post_id ) {
		$pair = jiwf_translation_id( $post_id, $lang );
		if ( $pair && get_post_status( $pair ) === 'publish' ) {
			return jiwf_url_with_lang( get_permalink( $pair ), $lang );
		}
	}

	// Same URL with the lang flag flipped is a sensible default.
	$current = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	return jiwf_url_with_lang( $current, $lang );
}

/**
 * Translation meta box (Pages + every public CPT we registered).
 */
add_action( 'add_meta_boxes', 'jiwf_register_translation_meta_box' );
function jiwf_register_translation_meta_box() {
	$post_types = array( 'post', 'page', 'program', 'event', 'faculty', 'partner', 'location', 'testimonial' );
	foreach ( $post_types as $pt ) {
		add_meta_box(
			'jiwf_translations',
			__( 'Translations / 翻訳ペア', 'jiwf-academy' ),
			'jiwf_render_translation_meta_box',
			$pt,
			'side',
			'default'
		);
	}
}

function jiwf_render_translation_meta_box( WP_Post $post ) {
	wp_nonce_field( 'jiwf_translations_save', 'jiwf_translations_nonce' );

	$pair_ja = (int) get_post_meta( $post->ID, '_jiwf_translation_ja', true );
	$pair_en = (int) get_post_meta( $post->ID, '_jiwf_translation_en', true );

	$pages_args = array(
		'post_type'      => $post->post_type,
		'posts_per_page' => 200,
		'post__not_in'   => array( $post->ID ),
		'post_status'    => array( 'publish', 'draft', 'private' ),
		'orderby'        => 'title',
		'order'          => 'ASC',
	);
	$candidates = get_posts( $pages_args );

	$render_select = function ( $name, $current ) use ( $candidates ) {
		echo '<select name="' . esc_attr( $name ) . '" style="width:100%;">';
		echo '<option value="0">' . esc_html__( '— None —', 'jiwf-academy' ) . '</option>';
		foreach ( $candidates as $c ) {
			printf(
				'<option value="%d"%s>%s</option>',
				(int) $c->ID,
				selected( $current, $c->ID, false ),
				esc_html( get_the_title( $c ) )
			);
		}
		echo '</select>';
	};

	echo '<p style="margin:0 0 8px;"><strong>' . esc_html__( 'Japanese version', 'jiwf-academy' ) . '</strong></p>';
	$render_select( '_jiwf_translation_ja', $pair_ja );

	echo '<p style="margin:14px 0 8px;"><strong>' . esc_html__( 'English version', 'jiwf-academy' ) . '</strong></p>';
	$render_select( '_jiwf_translation_en', $pair_en );

	echo '<p style="margin-top:12px;font-size:12px;color:#666;">';
	echo esc_html__( 'Pick the post that holds the other language\'s copy. The language switcher in the header will jump between the two.', 'jiwf-academy' );
	echo '</p>';
}

add_action( 'save_post', 'jiwf_save_translation_meta', 10, 1 );
function jiwf_save_translation_meta( $post_id ) {
	if ( ! isset( $_POST['jiwf_translations_nonce'] ) || ! wp_verify_nonce( $_POST['jiwf_translations_nonce'], 'jiwf_translations_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	foreach ( array( 'ja', 'en' ) as $lang ) {
		$key   = '_jiwf_translation_' . $lang;
		$value = isset( $_POST[ $key ] ) ? absint( $_POST[ $key ] ) : 0;
		if ( $value ) {
			update_post_meta( $post_id, $key, $value );
			// Mirror back so the partner also points to us.
			$reverse_lang = $lang === 'ja' ? 'en' : 'ja';
			$existing = (int) get_post_meta( $value, '_jiwf_translation_' . $reverse_lang, true );
			if ( $existing !== (int) $post_id ) {
				update_post_meta( $value, '_jiwf_translation_' . $reverse_lang, (int) $post_id );
			}
		} else {
			delete_post_meta( $post_id, $key );
		}
	}
}
