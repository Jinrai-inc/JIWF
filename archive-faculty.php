<?php
/**
 * Faculty archive.
 *
 * @package jiwf-academy
 */

get_header();
$lang = jiwf_current_lang();
?>

<?php get_template_part( 'template-parts/hero/hero-page', null, array(
	'eyebrow' => __( 'Faculty', 'jiwf-academy' ),
	'title'   => $lang === 'ja' ? '教師たち' : 'Our Teachers.',
) ); ?>

<section class="section section--ivory">
	<div class="container">
		<div class="card-grid card-grid--3">
			<?php while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/cards/card-faculty' );
			endwhile; ?>
		</div>
		<?php the_posts_pagination(); ?>
	</div>
</section>

<?php get_footer();
