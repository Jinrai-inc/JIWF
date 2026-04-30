<?php
/**
 * Template Name: About
 *
 * The body is composed in Gutenberg. Insert the "About — starter" pattern
 * (Block inserter → Patterns → JIWF Academy) when creating the page.
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
