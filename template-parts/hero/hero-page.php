<?php
/**
 * Inner-page hero.
 *
 * @package jiwf-academy
 */

$eyebrow = isset( $args['eyebrow'] ) ? $args['eyebrow'] : '';
$title   = isset( $args['title'] ) ? $args['title'] : get_the_title();
$lead    = isset( $args['lead'] ) ? $args['lead'] : '';
?>
<section class="page-hero">
	<div class="container">
		<?php if ( $eyebrow ) : ?>
			<span class="page-hero__eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
		<?php endif; ?>
		<h1 class="page-hero__title"><?php echo esc_html( $title ); ?></h1>
		<?php if ( $lead ) : ?>
			<p class="page-hero__lead"><?php echo wp_kses_post( $lead ); ?></p>
		<?php endif; ?>
	</div>
</section>
