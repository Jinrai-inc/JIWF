<?php
/**
 * Customizer — site-wide brand settings, hero images, footer.
 * Replaces the ACF Options page with native WP_Customize_* controls.
 *
 * Editors visit Appearance → Customize → "JIWF Brand".
 *
 * @package jiwf-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'customize_register', 'jiwf_customize_register' );
function jiwf_customize_register( WP_Customize_Manager $wp ) {
	$wp->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp->get_setting( 'blogdescription' )->transport = 'postMessage';

	/* === Brand panel === */
	$wp->add_panel( 'jiwf_panel', array(
		'title'    => __( 'JIWF Academy', 'jiwf-academy' ),
		'priority' => 25,
	) );

	/* --- Section: Tagline & Statement --- */
	$wp->add_section( 'jiwf_brand', array(
		'title' => __( 'Brand &amp; Tagline', 'jiwf-academy' ),
		'panel' => 'jiwf_panel',
	) );

	$pairs = array(
		'jiwf_tagline_jp'      => array( __( 'Tagline (Japanese)', 'jiwf-academy' ),    '智慧を生きる。未来を創る。' ),
		'jiwf_tagline_en'      => array( __( 'Tagline (English)', 'jiwf-academy' ),     'Live the Wisdom. Create the Future.' ),
		'jiwf_motto'           => array( __( 'Motto', 'jiwf-academy' ),                  'One Wisdom, One World' ),
		'jiwf_brand_statement' => array( __( 'Footer brand statement', 'jiwf-academy' ), 'A digital campus where wisdom meets leadership — a place for women to live their purpose and shape the future.' ),
	);
	foreach ( $pairs as $id => $row ) {
		list( $label, $default ) = $row;
		$wp->add_setting( $id, array( 'default' => $default, 'sanitize_callback' => 'sanitize_text_field' ) );
		$type = strpos( $id, 'statement' ) !== false ? 'textarea' : 'text';
		$wp->add_control( $id, array( 'label' => $label, 'section' => 'jiwf_brand', 'type' => $type ) );
	}

	/* --- Section: Hero & key images --- */
	$wp->add_section( 'jiwf_images', array(
		'title' => __( 'Home Page Imagery', 'jiwf-academy' ),
		'panel' => 'jiwf_panel',
	) );

	$image_settings = array(
		'jiwf_home_hero_image'   => __( 'Home hero (Fuji × Himalaya)', 'jiwf-academy' ),
		'jiwf_home_fuji_image'   => __( 'Fuji photo (Locations preview)', 'jiwf-academy' ),
		'jiwf_home_himalaya_image' => __( 'Himalaya photo (Locations preview)', 'jiwf-academy' ),
		'jiwf_home_about_image'  => __( 'About preview image', 'jiwf-academy' ),
	);
	foreach ( $image_settings as $id => $label ) {
		$wp->add_setting( $id, array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp->add_control( new WP_Customize_Image_Control( $wp, $id, array(
			'label'   => $label,
			'section' => 'jiwf_images',
		) ) );
	}

	/* --- Section: Contact / Newsletter / Social --- */
	$wp->add_section( 'jiwf_outreach', array(
		'title' => __( 'Contact &amp; Outreach', 'jiwf-academy' ),
		'panel' => 'jiwf_panel',
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
		'description' => __( 'Paste a MailPoet / Mailchimp embed snippet. Leave empty to show a Subscribe button.', 'jiwf-academy' ),
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
