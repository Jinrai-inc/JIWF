<?php
/**
 * Native WordPress meta boxes — replaces ACF.
 * Uses post meta + the WP-bundled media uploader (wp.media). No plugins required.
 *
 * Repeaters (curriculum modules, timetable, social links) are stored as
 * line-based structured textareas: each line becomes one entry, fields are
 * separated with " | ". Parsing helpers live in inc/helpers.php.
 *
 * @package jiwf-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* ------------------------------------------------------------------
 * Schema definition
 * ------------------------------------------------------------------ */

function jiwf_meta_schema() {
	return array(
		'program' => array(
			'title'  => __( 'Program Details', 'jiwf-academy' ),
			'fields' => array(
				'subtitle'           => array( 'type' => 'text',     'label' => __( 'Subtitle', 'jiwf-academy' ) ),
				'duration'           => array( 'type' => 'text',     'label' => __( 'Duration (e.g. 12 weeks)', 'jiwf-academy' ) ),
				'format'             => array( 'type' => 'select',   'label' => __( 'Format', 'jiwf-academy' ), 'options' => array( '' => '—', 'online' => 'Online', 'in-person' => 'In-person', 'hybrid' => 'Hybrid' ) ),
				'pillar_number'      => array( 'type' => 'number',   'label' => __( 'Pillar Number (1–5)', 'jiwf-academy' ), 'min' => 1, 'max' => 20 ),
				'icon_color'         => array( 'type' => 'select',   'label' => __( 'Icon Color', 'jiwf-academy' ), 'options' => array( 'gold' => 'Gold', 'rose' => 'Rose', 'sky' => 'Sky', 'navy' => 'Navy' ) ),
				'hero_image_id'      => array( 'type' => 'image',    'label' => __( 'Hero Image', 'jiwf-academy' ) ),
				'target_audience'    => array( 'type' => 'textarea', 'label' => __( 'Target Audience', 'jiwf-academy' ) ),
				'after_program'      => array( 'type' => 'textarea', 'label' => __( 'After This Program', 'jiwf-academy' ) ),
				'curriculum_modules' => array( 'type' => 'textarea', 'label' => __( 'Curriculum Modules (one per line: TITLE | DURATION | DESCRIPTION)', 'jiwf-academy' ), 'rows' => 8 ),
				'faculty_ids'        => array( 'type' => 'text',     'label' => __( 'Related Faculty post IDs (comma-separated)', 'jiwf-academy' ) ),
			),
		),
		'event' => array(
			'title'  => __( 'Event Details', 'jiwf-academy' ),
			'fields' => array(
				'event_date_start'  => array( 'type' => 'datetime',  'label' => __( 'Start Date / Time', 'jiwf-academy' ) ),
				'event_date_end'    => array( 'type' => 'datetime',  'label' => __( 'End Date / Time', 'jiwf-academy' ) ),
				'event_location'    => array( 'type' => 'text',      'label' => __( 'Location Name', 'jiwf-academy' ) ),
				'event_address'     => array( 'type' => 'text',      'label' => __( 'Address', 'jiwf-academy' ) ),
				'application_method' => array( 'type' => 'select',  'label' => __( 'Application Method', 'jiwf-academy' ), 'options' => array( 'contact' => 'Contact form', 'external' => 'External link' ) ),
				'external_url'      => array( 'type' => 'url',       'label' => __( 'External URL', 'jiwf-academy' ) ),
				'timetable'         => array( 'type' => 'textarea',  'label' => __( 'Timetable (one per line: TIME | TITLE | DESCRIPTION)', 'jiwf-academy' ), 'rows' => 8 ),
			),
		),
		'faculty' => array(
			'title'  => __( 'Faculty Details', 'jiwf-academy' ),
			'fields' => array(
				'name_jp'      => array( 'type' => 'text',     'label' => __( 'Name (Japanese)', 'jiwf-academy' ) ),
				'role_title'   => array( 'type' => 'text',     'label' => __( 'Title / Role', 'jiwf-academy' ) ),
				'bio_short'    => array( 'type' => 'textarea', 'label' => __( 'Short Bio', 'jiwf-academy' ) ),
				'specialties'  => array( 'type' => 'text',     'label' => __( 'Specialties (comma-separated)', 'jiwf-academy' ) ),
				'social_links' => array( 'type' => 'textarea', 'label' => __( 'Social Links (one per line: LABEL | URL)', 'jiwf-academy' ), 'rows' => 4 ),
				'portrait_id'  => array( 'type' => 'image',    'label' => __( 'Portrait', 'jiwf-academy' ) ),
			),
		),
		'partner' => array(
			'title'  => __( 'Partner Details', 'jiwf-academy' ),
			'fields' => array(
				'website_url' => array( 'type' => 'url',  'label' => __( 'Website URL', 'jiwf-academy' ) ),
				'region'      => array( 'type' => 'text', 'label' => __( 'Region / City', 'jiwf-academy' ) ),
				'logo_id'     => array( 'type' => 'image', 'label' => __( 'Logo (alternative to Featured Image)', 'jiwf-academy' ) ),
			),
		),
		'location' => array(
			'title'  => __( 'Location Details', 'jiwf-academy' ),
			'fields' => array(
				'country'       => array( 'type' => 'text',   'label' => __( 'Country', 'jiwf-academy' ) ),
				'city'          => array( 'type' => 'text',   'label' => __( 'City', 'jiwf-academy' ) ),
				'address'       => array( 'type' => 'text',   'label' => __( 'Address', 'jiwf-academy' ) ),
				'tagline'       => array( 'type' => 'text',   'label' => __( 'Tagline', 'jiwf-academy' ) ),
				'latitude'      => array( 'type' => 'number', 'label' => __( 'Latitude', 'jiwf-academy' ), 'step' => 'any' ),
				'longitude'     => array( 'type' => 'number', 'label' => __( 'Longitude', 'jiwf-academy' ), 'step' => 'any' ),
				'hero_image_id' => array( 'type' => 'image',  'label' => __( 'Hero Image', 'jiwf-academy' ) ),
			),
		),
		'testimonial' => array(
			'title'  => __( 'Testimonial Details', 'jiwf-academy' ),
			'fields' => array(
				'quote'        => array( 'type' => 'textarea', 'label' => __( 'Quote', 'jiwf-academy' ) ),
				'author_name'  => array( 'type' => 'text',     'label' => __( 'Author', 'jiwf-academy' ) ),
				'author_role'  => array( 'type' => 'text',     'label' => __( 'Author Role / Affiliation', 'jiwf-academy' ) ),
				'portrait_id'  => array( 'type' => 'image',    'label' => __( 'Portrait', 'jiwf-academy' ) ),
			),
		),
	);
}

/* ------------------------------------------------------------------
 * Register meta boxes
 * ------------------------------------------------------------------ */

add_action( 'add_meta_boxes', 'jiwf_register_meta_boxes' );
function jiwf_register_meta_boxes() {
	foreach ( jiwf_meta_schema() as $post_type => $cfg ) {
		add_meta_box(
			'jiwf_meta_' . $post_type,
			$cfg['title'],
			'jiwf_render_meta_box',
			$post_type,
			'normal',
			'high',
			array( 'post_type' => $post_type )
		);
	}
}

function jiwf_render_meta_box( WP_Post $post, $box ) {
	$schema    = jiwf_meta_schema();
	$post_type = $box['args']['post_type'];
	if ( empty( $schema[ $post_type ] ) ) {
		return;
	}

	wp_nonce_field( 'jiwf_meta_save', 'jiwf_meta_nonce' );

	echo '<div class="jiwf-meta-grid">';
	foreach ( $schema[ $post_type ]['fields'] as $key => $field ) {
		$value = get_post_meta( $post->ID, $key, true );
		$id    = 'jiwf_' . esc_attr( $key );
		printf( '<p class="jiwf-meta-field jiwf-meta-field--%s">', esc_attr( $field['type'] ) );
		printf( '<label for="%s"><strong>%s</strong></label>', esc_attr( $id ), esc_html( $field['label'] ) );

		switch ( $field['type'] ) {
			case 'textarea':
				$rows = $field['rows'] ?? 4;
				printf( '<textarea id="%s" name="%s" rows="%d" class="large-text">%s</textarea>', esc_attr( $id ), esc_attr( $key ), (int) $rows, esc_textarea( $value ) );
				break;
			case 'select':
				printf( '<select id="%s" name="%s">', esc_attr( $id ), esc_attr( $key ) );
				foreach ( $field['options'] as $ov => $ol ) {
					printf( '<option value="%s"%s>%s</option>', esc_attr( $ov ), selected( $ov, $value, false ), esc_html( $ol ) );
				}
				echo '</select>';
				break;
			case 'datetime':
				printf( '<input type="datetime-local" id="%s" name="%s" value="%s" class="regular-text">', esc_attr( $id ), esc_attr( $key ), esc_attr( $value ) );
				break;
			case 'number':
				$step = isset( $field['step'] ) ? (string) $field['step'] : '1';
				$min  = isset( $field['min'] ) ? ' min="' . esc_attr( $field['min'] ) . '"' : '';
				$max  = isset( $field['max'] ) ? ' max="' . esc_attr( $field['max'] ) . '"' : '';
				printf( '<input type="number" step="%s"%s%s id="%s" name="%s" value="%s" class="small-text">', esc_attr( $step ), $min, $max, esc_attr( $id ), esc_attr( $key ), esc_attr( $value ) );
				break;
			case 'url':
				printf( '<input type="url" id="%s" name="%s" value="%s" class="regular-text">', esc_attr( $id ), esc_attr( $key ), esc_attr( $value ) );
				break;
			case 'image':
				$preview = $value ? wp_get_attachment_image( (int) $value, 'thumbnail' ) : '';
				echo '<span class="jiwf-image-control">';
				printf( '<span class="jiwf-image-preview" data-empty="%s">%s</span>', esc_attr__( 'No image selected', 'jiwf-academy' ), $preview );
				printf( '<input type="hidden" id="%s" name="%s" value="%s">', esc_attr( $id ), esc_attr( $key ), esc_attr( $value ) );
				echo '<button type="button" class="button jiwf-image-pick">' . esc_html__( 'Select image', 'jiwf-academy' ) . '</button> ';
				echo '<button type="button" class="button-link jiwf-image-clear">' . esc_html__( 'Clear', 'jiwf-academy' ) . '</button>';
				echo '</span>';
				break;
			case 'text':
			default:
				printf( '<input type="text" id="%s" name="%s" value="%s" class="regular-text">', esc_attr( $id ), esc_attr( $key ), esc_attr( $value ) );
				break;
		}
		echo '</p>';
	}
	echo '</div>';
}

/* ------------------------------------------------------------------
 * Save
 * ------------------------------------------------------------------ */

add_action( 'save_post', 'jiwf_save_meta', 10, 2 );
function jiwf_save_meta( $post_id, $post ) {
	if ( ! isset( $_POST['jiwf_meta_nonce'] ) || ! wp_verify_nonce( $_POST['jiwf_meta_nonce'], 'jiwf_meta_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$schema = jiwf_meta_schema();
	if ( empty( $schema[ $post->post_type ] ) ) {
		return;
	}

	foreach ( $schema[ $post->post_type ]['fields'] as $key => $field ) {
		$raw = isset( $_POST[ $key ] ) ? wp_unslash( $_POST[ $key ] ) : '';

		switch ( $field['type'] ) {
			case 'textarea':
				$clean = sanitize_textarea_field( $raw );
				break;
			case 'url':
				$clean = esc_url_raw( $raw );
				break;
			case 'number':
			case 'image':
				$clean = $raw === '' ? '' : (string) ( $field['type'] === 'image' ? absint( $raw ) : (float) $raw );
				break;
			case 'select':
				$allowed = array_keys( $field['options'] );
				$clean   = in_array( $raw, $allowed, true ) ? $raw : '';
				break;
			case 'datetime':
				$clean = preg_match( '/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}/', $raw ) ? sanitize_text_field( $raw ) : '';
				break;
			case 'text':
			default:
				$clean = sanitize_text_field( $raw );
				break;
		}

		if ( $clean === '' ) {
			delete_post_meta( $post_id, $key );
		} else {
			update_post_meta( $post_id, $key, $clean );
		}
	}
}

/* ------------------------------------------------------------------
 * Admin assets — media uploader for image fields, light styling
 * ------------------------------------------------------------------ */

add_action( 'admin_enqueue_scripts', 'jiwf_meta_admin_assets' );
function jiwf_meta_admin_assets( $hook ) {
	if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
		return;
	}
	$screen = get_current_screen();
	if ( ! $screen || empty( jiwf_meta_schema()[ $screen->post_type ] ) ) {
		return;
	}

	wp_enqueue_media();
	wp_enqueue_script(
		'jiwf-meta',
		JIWF_THEME_URI . '/assets/js/admin-meta.js',
		array( 'jquery' ),
		JIWF_THEME_VERSION,
		true
	);

	$css = '
		.jiwf-meta-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px 24px; }
		.jiwf-meta-field { display: flex; flex-direction: column; gap: 4px; margin: 0; }
		.jiwf-meta-field label { font-size: 12px; }
		.jiwf-meta-field--textarea, .jiwf-meta-field--image { grid-column: 1 / -1; }
		.jiwf-meta-field input.regular-text, .jiwf-meta-field select { width: 100%; max-width: 480px; }
		.jiwf-image-control { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
		.jiwf-image-preview { display: inline-block; min-width: 80px; min-height: 60px; background: #f0f0f1; padding: 4px; }
		.jiwf-image-preview:empty::before { content: attr(data-empty); font-size: 12px; color: #888; padding: 8px; display: inline-block; }
	';
	wp_register_style( 'jiwf-meta', false );
	wp_enqueue_style( 'jiwf-meta' );
	wp_add_inline_style( 'jiwf-meta', $css );
}
