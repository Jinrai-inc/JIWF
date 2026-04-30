<?php
/**
 * Programs archive — Five Pillars of Wisdom.
 *
 * @package jiwf-academy
 */

get_header();
$lang = jiwf_current_lang();
?>

<?php get_template_part( 'template-parts/hero/hero-page', null, array(
	'eyebrow'       => __( 'Programs', 'jiwf-academy' ),
	'title'         => $lang === 'ja' ? '智慧の5つの柱' : 'Five Pillars of Wisdom.',
	'lead'          => $lang === 'ja'
		? '人生をつくる5つの学びの柱。あなたが今、必要としている扉を選んでください。'
		: 'Five doors into a life of wisdom. Step through whichever calls to you.',
	'image_setting' => 'jiwf_page_hero_programs',
) ); ?>

<section class="section section--ivory">
	<div class="container">
		<div class="card-grid card-grid--3">
			<?php
			$i = 0;
			while ( have_posts() ) :
				the_post();
				$i++;
				get_template_part( 'template-parts/cards/card-program', null, array( 'num' => $i ) );
			endwhile;
			?>
		</div>

		<?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
	</div>
</section>

<?php get_template_part( 'template-parts/sections/section-cta' ); ?>

<?php get_footer();
