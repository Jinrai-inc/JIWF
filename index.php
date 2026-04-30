<?php
/**
 * Fallback index — used when no more specific template applies.
 *
 * @package jiwf-academy
 */

get_header();
?>

<?php get_template_part( 'template-parts/hero/hero-page', null, array(
	'eyebrow' => __( 'Journal', 'jiwf-academy' ),
	'title'   => single_post_title( '', false ) ?: __( 'Journal', 'jiwf-academy' ),
) ); ?>

<section class="section section--ivory">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="card-grid card-grid--3">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="card fade-up">
						<time class="card__meta"><?php echo esc_html( get_the_date() ); ?></time>
						<h3 class="card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?></p>
						<a class="card__cta" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read', 'jiwf-academy' ); ?></a>
					</article>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p style="text-align:center; color: var(--jiwf-text-muted);">
				<?php esc_html_e( 'New entries will appear here soon.', 'jiwf-academy' ); ?>
			</p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer();
