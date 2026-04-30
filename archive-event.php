<?php
/**
 * Events archive.
 *
 * @package jiwf-academy
 */

get_header();
$lang = jiwf_current_lang();
?>

<?php get_template_part( 'template-parts/hero/hero-page', null, array(
	'eyebrow' => __( 'Events', 'jiwf-academy' ),
	'title'   => $lang === 'ja' ? 'イベント・リトリート' : 'Gatherings &amp; Retreats.',
	'lead'    => $lang === 'ja'
		? '世界と日本で開かれる、JIWF Academyの集い。'
		: 'Where the Academy gathers — in Japan, in India, and online.',
) ); ?>

<section class="section section--ivory">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="card-grid card-grid--3">
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/cards/card-event' );
				endwhile; ?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p style="text-align:center; color: var(--jiwf-text-muted);">
				<?php esc_html_e( 'New events will be announced here soon.', 'jiwf-academy' ); ?>
			</p>
		<?php endif; ?>
	</div>
</section>

<?php get_template_part( 'template-parts/sections/section-cta' ); ?>

<?php get_footer();
