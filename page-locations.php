<?php
/**
 * Template Name: Locations
 *
 * The body is composed in Gutenberg. Insert the "Locations — Japan & India
 * split" pattern; pair it with the "Page hero" pattern at the top.
 *
 * @package jiwf-academy
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<article class="entry entry--page">
		<div class="entry__content">
			<?php the_content(); ?>
		</div>
	</article>
	<?php
endwhile;

get_footer();
