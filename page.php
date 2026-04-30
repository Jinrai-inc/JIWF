<?php
/**
 * Generic page — pure Gutenberg shell.
 *
 * If the page contains blocks, the body is rendered as-is so editors keep
 * full control over alignment / full-width sections. Otherwise the legacy
 * narrow column layout (with auto page-hero) is used.
 *
 * @package jiwf-academy
 */

get_header();

while ( have_posts() ) :
	the_post();

	$has_blocks = has_blocks( get_post() );
	?>
	<article class="entry entry--page<?php echo $has_blocks ? ' entry--blocks' : ''; ?>">

		<?php if ( ! $has_blocks ) : ?>
			<?php get_template_part( 'template-parts/hero/hero-page', null, array(
				'title' => get_the_title(),
			) ); ?>
		<?php endif; ?>

		<?php if ( $has_blocks ) : ?>
			<?php the_content(); ?>
		<?php else : ?>
			<section class="section section--ivory">
				<div class="container container--narrow entry-content">
					<?php the_content(); ?>
				</div>
			</section>
		<?php endif; ?>
	</article>
	<?php
endwhile;

get_footer();
