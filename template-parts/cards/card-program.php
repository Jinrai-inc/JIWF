<?php
/**
 * Program card.
 *
 * @package jiwf-academy
 */
$num = isset( $args['num'] ) ? (int) $args['num'] : 0;
$subtitle = jiwf_field( 'subtitle' );
?>
<article class="card fade-up">
	<?php if ( $num ) : ?>
		<span class="card__chapter"><?php echo esc_html( jiwf_roman( $num ) ); ?></span>
	<?php endif; ?>
	<h3 class="card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php if ( $subtitle ) : ?>
		<p class="card__meta"><?php echo esc_html( $subtitle ); ?></p>
	<?php endif; ?>
	<p class="card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 32 ) ); ?></p>
	<a class="card__cta" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Explore', 'jiwf-academy' ); ?></a>
</article>
