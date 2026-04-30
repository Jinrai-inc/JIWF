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
	'eyebrow'       => 'Events',
	'title'         => 'イベント・リトリート',
	'lead'          => '世界と日本で開かれる、JIWF Academy の集い。',
	'image_setting' => 'jiwf_page_hero_events',
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
			<div style="text-align:center; max-width: 540px; margin: 0 auto; padding: var(--space-2xl) var(--space-md);">
				<p style="font-family: var(--font-jp-serif); font-size: var(--text-xl); color: var(--jiwf-navy); margin-bottom: var(--space-md);">
					ただいま、開催予定のイベントはありません。
				</p>
				<p style="color: var(--jiwf-text-muted);">
					次の集いの情報は、こちらと公式ニュースレターで近日中にご案内いたします。
				</p>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php get_template_part( 'template-parts/sections/section-cta' ); ?>

<?php get_footer();
