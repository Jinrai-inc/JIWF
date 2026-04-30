<?php
/**
 * Template Name: Community
 *
 * The body is composed in Gutenberg. Insert the "Community — starter"
 * pattern when creating the page, then add a "Partners — types + logos"
 * pattern beneath and edit each row.
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
