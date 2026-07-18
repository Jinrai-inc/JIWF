<?php
/**
 * Event card. The whole card acts as a link to the event — the visible
 * title anchor stretches over the full card via ::after, which keeps
 * semantic HTML while turning the entire block into a tap target.
 *
 * @package jiwf-academy
 */
$start = jiwf_field( 'event_date_start' );
$end   = jiwf_field( 'event_date_end' );
$loc   = jiwf_field( 'event_location' );
?>
<article class="card card--linked fade-up">
	<?php if ( $start ) : ?>
		<time class="card__date" datetime="<?php echo esc_attr( $start ); ?>"><?php echo esc_html( jiwf_format_event_date( $start, $end ) ); ?></time>
	<?php endif; ?>
	<h3 class="card__title"><a class="card__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php if ( $loc ) : ?>
		<p class="card__meta"><?php echo esc_html( $loc ); ?></p>
	<?php endif; ?>
	<p class="card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
	<span class="card__cta" aria-hidden="true">詳細を見る</span>
</article>
