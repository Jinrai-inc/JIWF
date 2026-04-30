<?php
/**
 * Generic page template.
 *
 * @package jiwf-academy
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<?php get_template_part( 'template-parts/hero/hero-page', null, array(
		'title' => get_the_title(),
	) ); ?>

	<article class="section section--ivory">
		<div class="container container--narrow entry-content">
			<?php the_content(); ?>
		</div>
	</article>
	<?php
endwhile;

get_footer();
