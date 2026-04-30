<?php
/**
 * Template Name: Contact
 *
 * The body is composed in Gutenberg. Use a Columns block: left column =
 * "Contact — secondary info column" pattern, right column = your Contact
 * Form 7 shortcode.
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
