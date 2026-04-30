<?php
/**
 * Editor-facing shortcodes for the gold divider and chapter numerals.
 *
 * @package jiwf-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_shortcode( 'jiwf_divider', 'jiwf_sc_divider' );
function jiwf_sc_divider( $atts ) {
	$atts = shortcode_atts( array( 'symbol' => '✦' ), $atts );
	ob_start(); ?>
	<div class="jiwf-divider" aria-hidden="true">
		<span class="jiwf-divider__line"></span>
		<span class="jiwf-divider__symbol"><?php echo esc_html( $atts['symbol'] ); ?></span>
		<span class="jiwf-divider__line"></span>
	</div>
	<?php
	return ob_get_clean();
}

add_shortcode( 'jiwf_chapter', 'jiwf_sc_chapter' );
function jiwf_sc_chapter( $atts, $content = '' ) {
	$atts = shortcode_atts( array( 'num' => '1' ), $atts );
	$num  = ctype_digit( (string) $atts['num'] ) ? jiwf_roman( (int) $atts['num'] ) : $atts['num'];
	return '<span class="chapter-num">' . esc_html( $num ) . '</span> ' . wp_kses_post( $content );
}
