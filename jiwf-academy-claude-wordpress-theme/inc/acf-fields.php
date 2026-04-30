<?php
/**
 * Programmatic ACF field group registration.
 * Requires Advanced Custom Fields (free version is sufficient).
 *
 * @package jiwf-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'acf/include_fields', 'jiwf_register_acf_fields' );
function jiwf_register_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	/* === PROGRAM === */
	acf_add_local_field_group(
		array(
			'key'      => 'group_jiwf_program',
			'title'    => __( 'Program Details', 'jiwf-academy' ),
			'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'program' ) ) ),
			'fields'   => array(
				array( 'key' => 'field_jiwf_prog_subtitle', 'name' => 'subtitle', 'label' => 'Subtitle', 'type' => 'text' ),
				array( 'key' => 'field_jiwf_prog_hero', 'name' => 'hero_image', 'label' => 'Hero Image', 'type' => 'image', 'return_format' => 'array' ),
				array( 'key' => 'field_jiwf_prog_duration', 'name' => 'duration', 'label' => 'Duration (e.g. 12 weeks)', 'type' => 'text' ),
				array(
					'key'     => 'field_jiwf_prog_format',
					'name'    => 'format',
					'label'   => 'Format',
					'type'    => 'select',
					'choices' => array( 'online' => 'Online', 'in-person' => 'In-person', 'hybrid' => 'Hybrid' ),
				),
				array(
					'key'        => 'field_jiwf_prog_modules',
					'name'       => 'curriculum_modules',
					'label'      => 'Curriculum Modules',
					'type'       => 'repeater',
					'layout'     => 'block',
					'sub_fields' => array(
						array( 'key' => 'field_jiwf_prog_mod_title', 'name' => 'module_title', 'label' => 'Title', 'type' => 'text' ),
						array( 'key' => 'field_jiwf_prog_mod_desc', 'name' => 'module_description', 'label' => 'Description', 'type' => 'textarea', 'rows' => 3 ),
						array( 'key' => 'field_jiwf_prog_mod_dur', 'name' => 'module_duration', 'label' => 'Duration', 'type' => 'text' ),
					),
				),
				array( 'key' => 'field_jiwf_prog_audience', 'name' => 'target_audience', 'label' => 'Target Audience', 'type' => 'textarea', 'rows' => 4 ),
				array( 'key' => 'field_jiwf_prog_after', 'name' => 'after_program', 'label' => 'After This Program', 'type' => 'textarea', 'rows' => 4 ),
				array(
					'key'        => 'field_jiwf_prog_faculty',
					'name'       => 'faculty_relation',
					'label'      => 'Faculty',
					'type'       => 'relationship',
					'post_type'  => array( 'faculty' ),
					'return_format' => 'id',
				),
			),
		)
	);

	/* === EVENT === */
	acf_add_local_field_group(
		array(
			'key'      => 'group_jiwf_event',
			'title'    => __( 'Event Details', 'jiwf-academy' ),
			'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'event' ) ) ),
			'fields'   => array(
				array( 'key' => 'field_jiwf_evt_start', 'name' => 'event_date_start', 'label' => 'Start Date / Time', 'type' => 'date_time_picker', 'return_format' => 'Y-m-d H:i:s' ),
				array( 'key' => 'field_jiwf_evt_end', 'name' => 'event_date_end', 'label' => 'End Date / Time', 'type' => 'date_time_picker', 'return_format' => 'Y-m-d H:i:s' ),
				array( 'key' => 'field_jiwf_evt_loc', 'name' => 'event_location', 'label' => 'Location Name', 'type' => 'text' ),
				array( 'key' => 'field_jiwf_evt_addr', 'name' => 'event_address', 'label' => 'Address', 'type' => 'text' ),
				array(
					'key'        => 'field_jiwf_evt_program',
					'name'       => 'event_program_relation',
					'label'      => 'Related Program',
					'type'       => 'relationship',
					'post_type'  => array( 'program' ),
					'return_format' => 'id',
				),
				array(
					'key'        => 'field_jiwf_evt_timetable',
					'name'       => 'timetable',
					'label'      => 'Timetable',
					'type'       => 'repeater',
					'layout'     => 'table',
					'sub_fields' => array(
						array( 'key' => 'field_jiwf_evt_tt_time', 'name' => 'time', 'label' => 'Time', 'type' => 'text' ),
						array( 'key' => 'field_jiwf_evt_tt_title', 'name' => 'title', 'label' => 'Title', 'type' => 'text' ),
						array( 'key' => 'field_jiwf_evt_tt_desc', 'name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'rows' => 2 ),
					),
				),
				array(
					'key'     => 'field_jiwf_evt_apply_method',
					'name'    => 'application_method',
					'label'   => 'Application Method',
					'type'    => 'select',
					'choices' => array( 'contact' => 'Contact form', 'external' => 'External link' ),
					'default_value' => 'contact',
				),
				array( 'key' => 'field_jiwf_evt_external', 'name' => 'external_url', 'label' => 'External URL', 'type' => 'url' ),
			),
		)
	);

	/* === FACULTY === */
	acf_add_local_field_group(
		array(
			'key'      => 'group_jiwf_faculty',
			'title'    => __( 'Faculty Details', 'jiwf-academy' ),
			'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'faculty' ) ) ),
			'fields'   => array(
				array( 'key' => 'field_jiwf_fac_en', 'name' => 'name_en', 'label' => 'Name (English)', 'type' => 'text' ),
				array( 'key' => 'field_jiwf_fac_jp', 'name' => 'name_jp', 'label' => 'Name (Japanese)', 'type' => 'text' ),
				array( 'key' => 'field_jiwf_fac_title', 'name' => 'title', 'label' => 'Title / Role', 'type' => 'text' ),
				array( 'key' => 'field_jiwf_fac_bio_short', 'name' => 'bio_short', 'label' => 'Short Bio', 'type' => 'textarea', 'rows' => 3 ),
				array( 'key' => 'field_jiwf_fac_bio_long', 'name' => 'bio_long', 'label' => 'Long Bio', 'type' => 'wysiwyg', 'media_upload' => 0, 'tabs' => 'visual' ),
				array( 'key' => 'field_jiwf_fac_portrait', 'name' => 'portrait', 'label' => 'Portrait', 'type' => 'image', 'return_format' => 'array' ),
				array( 'key' => 'field_jiwf_fac_special', 'name' => 'specialties', 'label' => 'Specialties (comma separated)', 'type' => 'text' ),
				array(
					'key'        => 'field_jiwf_fac_social',
					'name'       => 'social_links',
					'label'      => 'Social Links',
					'type'       => 'repeater',
					'layout'     => 'table',
					'sub_fields' => array(
						array( 'key' => 'field_jiwf_fac_social_label', 'name' => 'label', 'label' => 'Label', 'type' => 'text' ),
						array( 'key' => 'field_jiwf_fac_social_url', 'name' => 'url', 'label' => 'URL', 'type' => 'url' ),
					),
				),
			),
		)
	);

	/* === PARTNER === */
	acf_add_local_field_group(
		array(
			'key'      => 'group_jiwf_partner',
			'title'    => __( 'Partner Details', 'jiwf-academy' ),
			'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'partner' ) ) ),
			'fields'   => array(
				array( 'key' => 'field_jiwf_part_logo', 'name' => 'logo', 'label' => 'Logo', 'type' => 'image', 'return_format' => 'array' ),
				array( 'key' => 'field_jiwf_part_url', 'name' => 'website_url', 'label' => 'Website URL', 'type' => 'url' ),
				array( 'key' => 'field_jiwf_part_region', 'name' => 'region', 'label' => 'Region / City', 'type' => 'text' ),
			),
		)
	);

	/* === LOCATION === */
	acf_add_local_field_group(
		array(
			'key'      => 'group_jiwf_location',
			'title'    => __( 'Location Details', 'jiwf-academy' ),
			'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'location' ) ) ),
			'fields'   => array(
				array( 'key' => 'field_jiwf_loc_country', 'name' => 'country', 'label' => 'Country', 'type' => 'text' ),
				array( 'key' => 'field_jiwf_loc_city', 'name' => 'city', 'label' => 'City', 'type' => 'text' ),
				array( 'key' => 'field_jiwf_loc_address', 'name' => 'address', 'label' => 'Address', 'type' => 'text' ),
				array( 'key' => 'field_jiwf_loc_lat', 'name' => 'latitude', 'label' => 'Latitude', 'type' => 'number' ),
				array( 'key' => 'field_jiwf_loc_lng', 'name' => 'longitude', 'label' => 'Longitude', 'type' => 'number' ),
				array( 'key' => 'field_jiwf_loc_hero', 'name' => 'hero_image', 'label' => 'Hero Image', 'type' => 'image', 'return_format' => 'array' ),
				array( 'key' => 'field_jiwf_loc_tagline', 'name' => 'tagline', 'label' => 'Tagline', 'type' => 'text' ),
			),
		)
	);

	/* === TESTIMONIAL === */
	acf_add_local_field_group(
		array(
			'key'      => 'group_jiwf_testimonial',
			'title'    => __( 'Testimonial Details', 'jiwf-academy' ),
			'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'testimonial' ) ) ),
			'fields'   => array(
				array( 'key' => 'field_jiwf_test_quote', 'name' => 'quote', 'label' => 'Quote', 'type' => 'textarea', 'rows' => 4 ),
				array( 'key' => 'field_jiwf_test_author', 'name' => 'author', 'label' => 'Author', 'type' => 'text' ),
				array( 'key' => 'field_jiwf_test_role', 'name' => 'author_role', 'label' => 'Author Role / Affiliation', 'type' => 'text' ),
				array( 'key' => 'field_jiwf_test_portrait', 'name' => 'portrait', 'label' => 'Portrait', 'type' => 'image', 'return_format' => 'array' ),
			),
		)
	);

	/* === SITE-WIDE OPTIONS (theme settings) === */
	acf_add_local_field_group(
		array(
			'key'      => 'group_jiwf_site_options',
			'title'    => __( 'Site Settings', 'jiwf-academy' ),
			'location' => array( array( array( 'param' => 'options_page', 'operator' => '==', 'value' => 'jiwf-site-options' ) ) ),
			'fields'   => array(
				array( 'key' => 'field_jiwf_opt_brand_statement', 'name' => 'brand_statement', 'label' => 'Brand Statement', 'type' => 'textarea', 'rows' => 3 ),
				array( 'key' => 'field_jiwf_opt_newsletter_embed', 'name' => 'newsletter_embed', 'label' => 'Newsletter Embed (HTML)', 'type' => 'textarea', 'rows' => 6 ),
				array( 'key' => 'field_jiwf_opt_contact_email', 'name' => 'contact_email', 'label' => 'Contact Email', 'type' => 'email' ),
				array(
					'key'        => 'field_jiwf_opt_social',
					'name'       => 'social_links',
					'label'      => 'Social Links',
					'type'       => 'repeater',
					'layout'     => 'table',
					'sub_fields' => array(
						array( 'key' => 'field_jiwf_opt_social_label', 'name' => 'label', 'label' => 'Label', 'type' => 'text' ),
						array( 'key' => 'field_jiwf_opt_social_url', 'name' => 'url', 'label' => 'URL', 'type' => 'url' ),
					),
				),
			),
		)
	);
}

add_action( 'acf/init', 'jiwf_acf_options_page' );
function jiwf_acf_options_page() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page(
			array(
				'page_title' => __( 'JIWF Site Settings', 'jiwf-academy' ),
				'menu_title' => __( 'JIWF Settings', 'jiwf-academy' ),
				'menu_slug'  => 'jiwf-site-options',
				'capability' => 'manage_options',
				'icon_url'   => 'dashicons-admin-customizer',
				'position'   => 3,
			)
		);
	}
}
