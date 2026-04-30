<?php
/**
 * One-shot content scaffolding.
 *
 * On theme activation this seeds the standard JIWF Academy pages
 * (About / Locations / Community / Contact / Privacy / Terms), builds a
 * Primary navigation menu pointing at them plus the program & event
 * archives, and assigns the menu to the `primary` location.
 *
 * The work is idempotent: every step skips entities that already exist,
 * so editors can safely tweak titles/slugs after the first run.
 *
 * @package jiwf-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'after_switch_theme', 'jiwf_install_starter_content' );
function jiwf_install_starter_content() {
	$pages = jiwf_seed_pages();
	jiwf_seed_primary_menu( $pages );
	update_option( 'jiwf_content_seeded', JIWF_THEME_VERSION );
}

/**
 * Re-run the seed manually by visiting /wp-admin/?jiwf_seed=1
 * (useful if the theme was activated before this code shipped).
 */
add_action( 'admin_init', 'jiwf_maybe_reseed' );
function jiwf_maybe_reseed() {
	if ( ! current_user_can( 'manage_options' ) ) return;
	if ( empty( $_GET['jiwf_seed'] ) ) return;
	jiwf_install_starter_content();
	add_action( 'admin_notices', function () {
		echo '<div class="notice notice-success is-dismissible"><p><strong>JIWF Academy:</strong> Sample pages and primary menu seeded.</p></div>';
	} );
}

/**
 * Read a block pattern's raw markup off disk.
 */
function jiwf_pattern_markup( $slug ) {
	$file = JIWF_THEME_DIR . '/inc/patterns/' . $slug . '.php';
	if ( ! file_exists( $file ) ) return '';
	return (string) ( include $file );
}

/**
 * Privacy / Terms placeholder body — flagged with a clear TODO so it
 * never reaches production unreviewed.
 */
function jiwf_legal_placeholder( $kind ) {
	$intro = $kind === 'privacy'
		? '<p><strong>TODO:</strong> Replace this placeholder with the lawyer-reviewed Privacy Policy before going live.</p>'
		: '<p><strong>TODO:</strong> Replace this placeholder with the lawyer-reviewed Terms of Use before going live.</p>';

	$body = $kind === 'privacy'
		? '<p>JIWF Academy collects only the personal data needed to respond to enquiries, deliver newsletters, and operate its programs. We do not sell or share personal data with third parties beyond the service providers required to run the site.</p>'
		: '<p>By using this site you agree to engage with its content in good faith. The materials published here are for educational and informational purposes only.</p>';

	return <<<HTML
<!-- wp:paragraph -->
{$intro}
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Overview</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
{$body}
<!-- /wp:paragraph -->
HTML;
}

/**
 * Seed standard pages. Returns slug => post_id.
 */
function jiwf_seed_pages() {
	$pattern = function ( ...$slugs ) {
		$out = '';
		foreach ( $slugs as $s ) {
			$markup = jiwf_pattern_markup( $s );
			if ( $markup ) $out .= $markup . "\n\n";
		}
		return rtrim( $out );
	};

	$contact_form_placeholder = <<<HTML
<!-- wp:paragraph -->
<p><em>Tip: install Contact Form 7 (free), build your form, and paste its shortcode here — e.g. <code>[contact-form-7 id="123" title="Contact"]</code>.</em></p>
<!-- /wp:paragraph -->
HTML;

	$pages = array(
		'about' => array(
			'title'    => 'About',
			'template' => 'page-about.php',
			'content'  => $pattern( 'about-starter' ),
		),
		'campus' => array(
			'title'    => 'Locations',
			'template' => 'page-locations.php',
			'content'  => $pattern( 'page-hero', 'locations-pair', 'closing-cta' ),
		),
		'community' => array(
			'title'    => 'Community',
			'template' => 'page-community.php',
			'content'  => $pattern( 'community-starter' ),
		),
		'contact' => array(
			'title'    => 'Contact',
			'template' => 'page-contact.php',
			'content'  => $pattern( 'page-hero', 'contact-meta' ) . "\n\n" . $contact_form_placeholder,
		),
		'privacy' => array(
			'title'   => 'Privacy Policy',
			'content' => jiwf_legal_placeholder( 'privacy' ),
		),
		'terms' => array(
			'title'   => 'Terms of Use',
			'content' => jiwf_legal_placeholder( 'terms' ),
		),
	);

	$created = array();
	foreach ( $pages as $slug => $data ) {
		$existing = get_page_by_path( $slug, OBJECT, 'page' );
		if ( $existing instanceof WP_Post ) {
			$created[ $slug ] = (int) $existing->ID;
			continue;
		}

		$post_id = wp_insert_post( array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => $data['title'],
			'post_name'    => $slug,
			'post_content' => $data['content'] ?? '',
		) );

		if ( is_wp_error( $post_id ) || ! $post_id ) continue;

		if ( ! empty( $data['template'] ) ) {
			update_post_meta( $post_id, '_wp_page_template', $data['template'] );
		}
		$created[ $slug ] = (int) $post_id;
	}

	return $created;
}

/**
 * Seed the Primary nav menu and assign it to the `primary` location.
 */
function jiwf_seed_primary_menu( array $pages ) {
	$menu_name = __( 'Primary', 'jiwf-academy' );
	$menu      = wp_get_nav_menu_object( $menu_name );

	if ( ! $menu ) {
		$menu_id = wp_create_nav_menu( $menu_name );
		if ( is_wp_error( $menu_id ) ) return;
	} else {
		$menu_id = (int) $menu->term_id;
	}

	$existing_items = wp_get_nav_menu_items( $menu_id );

	if ( empty( $existing_items ) ) {
		$items = array(
			array( 'type' => 'page',    'key' => 'about',     'title' => __( 'About', 'jiwf-academy' ) ),
			array( 'type' => 'archive', 'object' => 'program', 'title' => __( 'Programs', 'jiwf-academy' ) ),
			array( 'type' => 'page',    'key' => 'campus',    'title' => __( 'Locations', 'jiwf-academy' ) ),
			array( 'type' => 'page',    'key' => 'community', 'title' => __( 'Community', 'jiwf-academy' ) ),
			array( 'type' => 'archive', 'object' => 'event',  'title' => __( 'Events', 'jiwf-academy' ) ),
			array( 'type' => 'page',    'key' => 'contact',   'title' => __( 'Contact', 'jiwf-academy' ) ),
		);

		$position = 1;
		foreach ( $items as $item ) {
			$args = array(
				'menu-item-title'    => $item['title'],
				'menu-item-status'   => 'publish',
				'menu-item-position' => $position++,
			);
			if ( $item['type'] === 'page' ) {
				$page_id = $pages[ $item['key'] ] ?? 0;
				if ( ! $page_id ) continue;
				$args['menu-item-type']      = 'post_type';
				$args['menu-item-object']    = 'page';
				$args['menu-item-object-id'] = $page_id;
			} else {
				$args['menu-item-type']   = 'post_type_archive';
				$args['menu-item-object'] = $item['object'];
			}
			wp_update_nav_menu_item( $menu_id, 0, $args );
		}
	}

	$locations = get_theme_mod( 'nav_menu_locations', array() );
	if ( empty( $locations['primary'] ) ) {
		$locations['primary'] = $menu_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}

	// Footer / Legal as well, if they aren't already assigned.
	if ( empty( $locations['legal'] ) ) {
		$legal_name = __( 'Legal', 'jiwf-academy' );
		$legal      = wp_get_nav_menu_object( $legal_name );
		if ( ! $legal ) {
			$legal_id = wp_create_nav_menu( $legal_name );
		} else {
			$legal_id = (int) $legal->term_id;
		}
		if ( ! is_wp_error( $legal_id ) ) {
			$legal_existing = wp_get_nav_menu_items( $legal_id );
			if ( empty( $legal_existing ) ) {
				foreach ( array( 'privacy' => __( 'Privacy', 'jiwf-academy' ), 'terms' => __( 'Terms', 'jiwf-academy' ) ) as $key => $label ) {
					$page_id = $pages[ $key ] ?? 0;
					if ( ! $page_id ) continue;
					wp_update_nav_menu_item( $legal_id, 0, array(
						'menu-item-title'       => $label,
						'menu-item-status'      => 'publish',
						'menu-item-type'        => 'post_type',
						'menu-item-object'      => 'page',
						'menu-item-object-id'   => $page_id,
					) );
				}
			}
			$locations['legal'] = $legal_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}
	}
}
