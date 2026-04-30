<?php
/**
 * Single post (Journal entry).
 *
 * @package jiwf-academy
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<?php get_template_part( 'template-parts/hero/hero-page', null, array(
		'eyebrow' => esc_html( get_the_date() ),
		'title'   => get_the_title(),
	) ); ?>

	<article class="section section--ivory">
		<div class="container container--narrow entry-content">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="image-frame" style="aspect-ratio: 16/9; margin-bottom: var(--space-xl);">
					<?php the_post_thumbnail( 'jiwf-hero', array( 'loading' => 'eager' ) ); ?>
				</div>
			<?php endif; ?>
			<?php the_content(); ?>
		</div>
	</article>
	<?php
endwhile;

get_footer();
