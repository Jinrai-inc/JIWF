<?php
/**
 * Custom post types: program, event, faculty, partner, testimonial, location.
 *
 * @package jiwf-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', 'jiwf_register_post_types' );
function jiwf_register_post_types() {
	$cpts = array(
		'program' => array(
			'singular' => __( 'Program', 'jiwf-academy' ),
			'plural'   => __( 'Programs', 'jiwf-academy' ),
			'slug'     => 'programs',
			'menu_icon' => 'dashicons-book',
			'menu_position' => 20,
		),
		'event' => array(
			'singular' => __( 'Event', 'jiwf-academy' ),
			'plural'   => __( 'Events', 'jiwf-academy' ),
			'slug'     => 'events',
			'menu_icon' => 'dashicons-calendar-alt',
			'menu_position' => 21,
		),
		'faculty' => array(
			'singular' => __( 'Faculty', 'jiwf-academy' ),
			'plural'   => __( 'Faculty', 'jiwf-academy' ),
			'slug'     => 'faculty',
			'menu_icon' => 'dashicons-businessperson',
			'menu_position' => 22,
		),
		'partner' => array(
			'singular' => __( 'Partner', 'jiwf-academy' ),
			'plural'   => __( 'Partners', 'jiwf-academy' ),
			'slug'     => 'partners',
			'menu_icon' => 'dashicons-groups',
			'menu_position' => 23,
		),
		'testimonial' => array(
			'singular' => __( 'Testimonial', 'jiwf-academy' ),
			'plural'   => __( 'Testimonials', 'jiwf-academy' ),
			'slug'     => 'voices',
			'menu_icon' => 'dashicons-format-quote',
			'menu_position' => 24,
			'has_archive' => false,
		),
		'location' => array(
			'singular' => __( 'Location', 'jiwf-academy' ),
			'plural'   => __( 'Locations', 'jiwf-academy' ),
			'slug'     => 'campus',
			'menu_icon' => 'dashicons-location',
			'menu_position' => 25,
		),
	);

	foreach ( $cpts as $key => $cfg ) {
		$labels = array(
			'name'               => $cfg['plural'],
			'singular_name'      => $cfg['singular'],
			'add_new_item'       => sprintf( __( 'Add New %s', 'jiwf-academy' ), $cfg['singular'] ),
			'edit_item'          => sprintf( __( 'Edit %s', 'jiwf-academy' ), $cfg['singular'] ),
			'new_item'           => sprintf( __( 'New %s', 'jiwf-academy' ), $cfg['singular'] ),
			'view_item'          => sprintf( __( 'View %s', 'jiwf-academy' ), $cfg['singular'] ),
			'search_items'       => sprintf( __( 'Search %s', 'jiwf-academy' ), $cfg['plural'] ),
			'not_found'          => __( 'Nothing found.', 'jiwf-academy' ),
			'not_found_in_trash' => __( 'Nothing found in Trash.', 'jiwf-academy' ),
			'all_items'          => $cfg['plural'],
		);

		register_post_type(
			$key,
			array(
				'labels'              => $labels,
				'public'              => true,
				'show_in_rest'        => true,
				'has_archive'         => isset( $cfg['has_archive'] ) ? $cfg['has_archive'] : true,
				'rewrite'             => array(
					'slug'       => $cfg['slug'],
					'with_front' => false,
				),
				'menu_icon'           => $cfg['menu_icon'],
				'menu_position'       => $cfg['menu_position'],
				'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes' ),
				'hierarchical'        => false,
			)
		);
	}
}
