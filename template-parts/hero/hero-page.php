<?php
/**
 * Inner-page hero. Optionally accepts a Customizer image setting key
 * via $args['image_setting'] to use as a darkened background.
 *
 * @package jiwf-academy
 */

$eyebrow = isset( $args['eyebrow'] ) ? $args['eyebrow'] : '';
$title   = isset( $args['title'] )   ? $args['title']   : get_the_title();
$lead    = isset( $args['lead'] )    ? $args['lead']    : '';
$bg_key  = isset( $args['image_setting'] ) ? $args['image_setting'] : '';

$bg_url = $bg_key ? jiwf_image_url( $bg_key, 'jiwf-hero' ) : '';
$has_bg = (bool) $bg_url;

$style = $has_bg
	? sprintf(
		'background-image: linear-gradient(180deg, rgba(20,33,61,0.45) 0%%, rgba(20,33,61,0.75) 100%%), url(%s); background-size: cover; background-position: center; color: var(--jiwf-ivory);',
		esc_url( $bg_url )
	)
	: '';
?>
<section class="page-hero<?php echo $has_bg ? ' page-hero--image' : ''; ?>"<?php echo $style ? ' style="' . esc_attr( $style ) . '"' : ''; ?>>
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
