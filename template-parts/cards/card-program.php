<?php
/**
 * Program card. Full-card click target via .card--linked.
 *
 * @package jiwf-academy
 */
$num = isset( $args['num'] ) ? (int) $args['num'] : 0;
$subtitle = jiwf_field( 'subtitle' );
?>
<article class="card card--linked fade-up">
	<?php if ( $num ) : ?>
		<span class="card__chapter"><?php echo esc_html( jiwf_roman( $num ) ); ?></span>
	<?php endif; ?>
	<h3 class="card__title"><a class="card__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php if ( $subtitle ) : ?>
		<p class="card__meta"><?php echo esc_html( $subtitle ); ?></p>
	<?php endif; ?>
	<p class="card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 32 ) ); ?></p>
	<span class="card__cta" aria-hidden="true">詳細を見る</span>
</article>
