<?php
/**
 * Gold divider with optional symbol.
 *
 * @package jiwf-academy
 */

$symbol = isset( $args['symbol'] ) ? $args['symbol'] : '✦';
$on_dark = ! empty( $args['on_dark'] );
?>
<div class="jiwf-divider<?php echo $on_dark ? ' jiwf-divider--on-dark' : ''; ?>" aria-hidden="true">
	<span class="jiwf-divider__line"></span>
	<span class="jiwf-divider__symbol"><?php echo esc_html( $symbol ); ?></span>
	<span class="jiwf-divider__line"></span>
</div>
