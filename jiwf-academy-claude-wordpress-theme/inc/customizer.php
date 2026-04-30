<?php
/**
 * Light-touch customizer hooks. Most theme settings live in ACF Site Settings.
 *
 * @package jiwf-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'customize_register', 'jiwf_customize_register' );
function jiwf_customize_register( WP_Customize_Manager $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->add_section( 'jiwf_brand', array(
		'title'    => __( 'JIWF Brand', 'jiwf-academy' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'jiwf_tagline_jp', array(
		'default'           => '智慧を生き、未来を創る。',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'jiwf_tagline_jp', array(
		'label'   => __( 'Tagline (Japanese)', 'jiwf-academy' ),
		'section' => 'jiwf_brand',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'jiwf_tagline_en', array(
		'default'           => 'Live the Wisdom. Create the Future.',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'jiwf_tagline_en', array(
		'label'   => __( 'Tagline (English)', 'jiwf-academy' ),
		'section' => 'jiwf_brand',
		'type'    => 'text',
	) );
}
