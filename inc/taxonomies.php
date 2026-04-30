<?php
/**
 * Custom taxonomies.
 *
 * @package jiwf-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', 'jiwf_register_taxonomies' );
function jiwf_register_taxonomies() {
	$taxes = array(
		'program_pillar' => array(
			'singular' => __( 'Pillar', 'jiwf-academy' ),
			'plural'   => __( 'Pillars', 'jiwf-academy' ),
			'object'   => array( 'program' ),
			'slug'     => 'pillar',
		),
		'event_type' => array(
			'singular' => __( 'Event Type', 'jiwf-academy' ),
			'plural'   => __( 'Event Types', 'jiwf-academy' ),
			'object'   => array( 'event' ),
			'slug'     => 'event-type',
		),
		'event_region' => array(
			'singular' => __( 'Region', 'jiwf-academy' ),
			'plural'   => __( 'Regions', 'jiwf-academy' ),
			'object'   => array( 'event' ),
			'slug'     => 'region',
		),
		'partner_type' => array(
			'singular' => __( 'Partner Type', 'jiwf-academy' ),
			'plural'   => __( 'Partner Types', 'jiwf-academy' ),
			'object'   => array( 'partner' ),
			'slug'     => 'partner-type',
		),
		'faculty_role' => array(
			'singular' => __( 'Faculty Role', 'jiwf-academy' ),
			'plural'   => __( 'Faculty Roles', 'jiwf-academy' ),
			'object'   => array( 'faculty' ),
			'slug'     => 'faculty-role',
		),
	);

	foreach ( $taxes as $tax => $cfg ) {
		register_taxonomy(
			$tax,
			$cfg['object'],
			array(
				'labels'            => array(
					'name'          => $cfg['plural'],
					'singular_name' => $cfg['singular'],
				),
				'public'            => true,
				'show_in_rest'      => true,
				'show_admin_column' => true,
				'hierarchical'      => true,
				'rewrite'           => array(
					'slug'       => $cfg['slug'],
					'with_front' => false,
				),
			)
		);
	}
}
