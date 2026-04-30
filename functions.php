<?php
/**
 * JIWF Academy theme bootstrap.
 *
 * @package jiwf-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'JIWF_THEME_VERSION', '1.1.0' );
define( 'JIWF_THEME_DIR', get_template_directory() );
define( 'JIWF_THEME_URI', get_template_directory_uri() );

require_once JIWF_THEME_DIR . '/inc/theme-supports.php';
require_once JIWF_THEME_DIR . '/inc/enqueue.php';
require_once JIWF_THEME_DIR . '/inc/cpt.php';
require_once JIWF_THEME_DIR . '/inc/taxonomies.php';
require_once JIWF_THEME_DIR . '/inc/meta-boxes.php';
require_once JIWF_THEME_DIR . '/inc/customizer.php';
require_once JIWF_THEME_DIR . '/inc/helpers.php';
require_once JIWF_THEME_DIR . '/inc/shortcodes.php';
require_once JIWF_THEME_DIR . '/inc/block-patterns.php';
require_once JIWF_THEME_DIR . '/inc/setup-content.php';
