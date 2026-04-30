<?php
/**
 * Customizer — every site-wide setting lives here.
 *
 * Editors visit:  Appearance → Customize → JIWF Academy
 *
 * Image controls use WP_Customize_Media_Control which stores the
 * attachment ID, so templates can render responsive (srcset) markup via
 * wp_get_attachment_image().
 *
 * @package jiwf-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Image setting slots — referenced from templates and from this file.
 * Format: setting_id => array( label, description ).
 */
function jiwf_image_settings() {
	return array(
		// Identity
		'jiwf_logo_dark' => array(
			__( 'Logo for dark backgrounds (footer)', 'jiwf-academy' ),
			__( 'Optional. If empty the standard site logo is used.', 'jiwf-academy' ),
		),

		// Home — main visuals
		'jiwf_home_hero_image' => array(
			__( 'Home hero (Fuji × Himalaya banner)', 'jiwf-academy' ),
			__( 'Full-screen background of the front page. Recommended 2400×1400.', 'jiwf-academy' ),
		),
		'jiwf_home_about_image' => array(
			__( 'Home — About preview image', 'jiwf-academy' ),
			'',
		),
		'jiwf_home_fuji_image' => array(
			__( 'Home — Fuji photo', 'jiwf-academy' ),
			__( 'Used in the Story trio and the Locations preview cards.', 'jiwf-academy' ),
		),
		'jiwf_home_himalaya_image' => array(
			__( 'Home — Himalaya photo', 'jiwf-academy' ),
			__( 'Used in the Story trio and the Locations preview cards.', 'jiwf-academy' ),
		),
		'jiwf_home_learning_image' => array(
			__( 'Home — Learning environment photo', 'jiwf-academy' ),
			__( 'Center image of the Story trio (interior / circle of women).', 'jiwf-academy' ),
		),

		// Page hero backdrops
		'jiwf_page_hero_about'     => array( __( 'Page hero — About', 'jiwf-academy' ),     '' ),
		'jiwf_page_hero_programs'  => array( __( 'Page hero — Programs',  'jiwf-academy' ), '' ),
		'jiwf_page_hero_locations' => array( __( 'Page hero — Locations', 'jiwf-academy' ), '' ),
		'jiwf_page_hero_community' => array( __( 'Page hero — Community', 'jiwf-academy' ), '' ),
		'jiwf_page_hero_events'    => array( __( 'Page hero — Events',    'jiwf-academy' ), '' ),
		'jiwf_page_hero_contact'   => array( __( 'Page hero — Contact',   'jiwf-academy' ), '' ),
	);
}

add_action( 'customize_register', 'jiwf_customize_register' );
function jiwf_customize_register( WP_Customize_Manager $wp ) {
	$wp->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp->get_setting( 'blogdescription' )->transport = 'postMessage';

	/* === Top-level panel === */
	$wp->add_panel( 'jiwf_panel', array(
		'title'       => __( 'JIWF Academy', 'jiwf-academy' ),
		'description' => __( 'Brand, copy, and imagery for the JIWF Academy theme.', 'jiwf-academy' ),
		'priority'    => 25,
	) );

	/* === Section: Brand & Tagline === */
	$wp->add_section( 'jiwf_brand', array(
		'title' => __( 'Brand &amp; Tagline', 'jiwf-academy' ),
		'panel' => 'jiwf_panel',
	) );

	$pairs = array(
		'jiwf_tagline_jp'      => array( __( 'Tagline (Japanese)', 'jiwf-academy' ),     '智慧を生きる。未来を創る。',                  'text' ),
		'jiwf_tagline_en'      => array( __( 'Tagline (English)', 'jiwf-academy' ),      'Live the Wisdom. Create the Future.',     'text' ),
		'jiwf_motto'           => array( __( 'Motto', 'jiwf-academy' ),                  'One Wisdom, One World',                   'text' ),
		'jiwf_brand_statement' => array( __( 'Footer brand statement', 'jiwf-academy' ), 'A digital campus where wisdom meets leadership — a place for women to live their purpose and shape the future.', 'textarea' ),
	);
	foreach ( $pairs as $id => $row ) {
		list( $label, $default, $type ) = $row;
		$wp->add_setting( $id, array( 'default' => $default, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp->add_control( $id, array( 'label' => $label, 'section' => 'jiwf_brand', 'type' => $type ) );
	}

	/* === Section: Home Page Imagery === */
	$wp->add_section( 'jiwf_home_imagery', array(
		'title'       => __( 'Home Page Imagery', 'jiwf-academy' ),
		'description' => __( 'Hero, story trio, About preview, and Locations preview. Drag-and-drop or pick from the media library.', 'jiwf-academy' ),
		'panel'       => 'jiwf_panel',
		'priority'    => 10,
	) );

	/* === Section: Identity & Page Hero Imagery === */
	$wp->add_section( 'jiwf_identity_imagery', array(
		'title'       => __( 'Identity &amp; Page Heroes', 'jiwf-academy' ),
		'description' => __( 'Optional dark-background logo, plus per-page hero backdrops.', 'jiwf-academy' ),
		'panel'       => 'jiwf_panel',
		'priority'    => 20,
	) );

	$home_keys = array(
		'jiwf_home_hero_image',
		'jiwf_home_about_image',
		'jiwf_home_fuji_image',
		'jiwf_home_learning_image',
		'jiwf_home_himalaya_image',
	);

	foreach ( jiwf_image_settings() as $id => $meta ) {
		list( $label, $desc ) = $meta;

		$wp->add_setting( $id, array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		) );

		$section = in_array( $id, $home_keys, true ) ? 'jiwf_home_imagery' : 'jiwf_identity_imagery';

		$wp->add_control( new WP_Customize_Media_Control( $wp, $id, array(
			'label'       => $label,
			'description' => $desc,
			'section'     => $section,
			'mime_type'   => 'image',
		) ) );
	}

	/* === Section: Contact & Outreach === */
	$wp->add_section( 'jiwf_outreach', array(
		'title'    => __( 'Contact &amp; Outreach', 'jiwf-academy' ),
		'panel'    => 'jiwf_panel',
		'priority' => 30,
	) );

	$wp->add_setting( 'jiwf_contact_email', array( 'default' => '', 'sanitize_callback' => 'sanitize_email' ) );
	$wp->add_control( 'jiwf_contact_email', array(
		'label'   => __( 'Contact email', 'jiwf-academy' ),
		'section' => 'jiwf_outreach',
		'type'    => 'email',
	) );

	$wp->add_setting( 'jiwf_newsletter_embed', array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
	$wp->add_control( 'jiwf_newsletter_embed', array(
		'label'       => __( 'Newsletter embed (HTML)', 'jiwf-academy' ),
		'description' => __( 'Paste a MailPoet / Mailchimp embed snippet. Leave empty to show a Subscribe button that links to /contact/.', 'jiwf-academy' ),
		'section'     => 'jiwf_outreach',
		'type'        => 'textarea',
	) );

	$wp->add_setting( 'jiwf_social_links', array( 'default' => '', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp->add_control( 'jiwf_social_links', array(
		'label'       => __( 'Social links', 'jiwf-academy' ),
		'description' => __( 'One per line, format: LABEL | URL  (e.g. "Instagram | https://instagram.com/jiwf")', 'jiwf-academy' ),
		'section'     => 'jiwf_outreach',
		'type'        => 'textarea',
	) );
}
