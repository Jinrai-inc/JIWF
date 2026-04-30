<?php
/**
 * Generic archive (used for taxonomies & blog index when no specific template exists).
 *
 * @package jiwf-academy
 */

get_header();
?>

<?php get_template_part( 'template-parts/hero/hero-page', null, array(
	'title' => get_the_archive_title(),
	'lead'  => wp_strip_all_tags( get_the_archive_description() ),
) ); ?>

<section class="section section--ivory">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="card-grid card-grid--3">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="card fade-up">
						<?php if ( get_the_date() ) : ?>
							<time class="card__meta"><?php echo esc_html( get_the_date() ); ?></time>
						<?php endif; ?>
						<h3 class="card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?></p>
						<a class="card__cta" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read', 'jiwf-academy' ); ?></a>
					</article>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php endif; ?>
	</div>
</section>

<?php get_footer();
