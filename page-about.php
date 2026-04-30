<?php
/**
 * Template Name: About
 *
 * @package jiwf-academy
 */

get_header();

$lang = jiwf_current_lang();

while ( have_posts() ) :
	the_post();
	?>

	<?php get_template_part( 'template-parts/hero/hero-page', null, array(
		'eyebrow'       => __( 'About', 'jiwf-academy' ),
		'title'         => $lang === 'ja' ? '新しい文明のための、新しい教育' : 'A new education for a new civilization.',
		'lead'          => $lang === 'ja'
			? '富士からヒマラヤへ。智慧を生き、未来を創る女性たちのデジタルキャンパス。'
			: 'From Mount Fuji to the Himalayas — a digital campus where women live the wisdom and shape the future.',
		'image_setting' => 'jiwf_page_hero_about',
	) ); ?>

	<section class="section section--ivory">
		<div class="container container--narrow entry-content fade-up">
			<?php the_content(); ?>
		</div>
	</section>

	<section class="section section--ivory-warm">
		<div class="container">
			<div class="section__head fade-up">
				<span class="eyebrow"><?php esc_html_e( 'Mission · Vision · Values', 'jiwf-academy' ); ?></span>
				<h2><?php echo $lang === 'ja' ? '私たちの誓い' : '<em>Our Compass</em>'; ?></h2>
			</div>
			<div class="card-grid card-grid--3">
				<article class="card fade-up">
					<span class="card__chapter">I</span>
					<h3 class="card__title"><?php esc_html_e( 'Mission', 'jiwf-academy' ); ?></h3>
					<p class="card__excerpt">
						<?php
						echo $lang === 'ja'
							? '東洋の智慧と現代のリーダーシップを統合し、女性の使命的人生を支える。'
							: 'To integrate ancient wisdom with modern leadership in service of women living their purpose.';
						?>
					</p>
				</article>
				<article class="card fade-up">
					<span class="card__chapter">II</span>
					<h3 class="card__title"><?php esc_html_e( 'Vision', 'jiwf-academy' ); ?></h3>
					<p class="card__excerpt">
						<?php
						echo $lang === 'ja'
							? '智慧と慈愛が世界の意思決定の中心にある社会。'
							: 'A world where wisdom and compassion sit at the center of every decision.';
						?>
					</p>
				</article>
				<article class="card fade-up">
					<span class="card__chapter">III</span>
					<h3 class="card__title"><?php esc_html_e( 'Values', 'jiwf-academy' ); ?></h3>
					<p class="card__excerpt">
						<?php
						echo $lang === 'ja'
							? '静けさ、知性、国際性、そして女性のエンパワーメント。'
							: 'Stillness, intellect, universality, and the empowerment of women.';
						?>
					</p>
				</article>
			</div>
		</div>
	</section>

	<section class="section section--ivory">
		<div class="container">
			<div class="section__head fade-up">
				<span class="eyebrow"><?php esc_html_e( 'Founding Story', 'jiwf-academy' ); ?></span>
				<h2><?php echo $lang === 'ja' ? '私たちの歩み' : '<em>Our Story</em>'; ?></h2>
			</div>
			<div class="timeline fade-up">
				<div class="timeline__item">
					<div class="timeline__year">2026</div>
					<h3 class="timeline__title"><?php esc_html_e( 'GITA Japan Summit', 'jiwf-academy' ); ?></h3>
					<p class="timeline__text">
						<?php
						echo $lang === 'ja'
							? '日本でのGITA Summit開催を契機に、JIWF Academyの構想が始まる。'
							: 'The GITA Japan Summit gives birth to the vision of JIWF Academy.';
						?>
					</p>
				</div>
				<div class="timeline__item">
					<div class="timeline__year">2026</div>
					<h3 class="timeline__title"><?php esc_html_e( 'JIWF Academy founded', 'jiwf-academy' ); ?></h3>
					<p class="timeline__text">
						<?php
						echo $lang === 'ja'
							? '日本とインドを結ぶ、女性のためのデジタルキャンパスとして始動。'
							: 'A digital campus for women — bridging Japan and India.';
						?>
					</p>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/sections/section-philosophy' ); ?>
	<?php get_template_part( 'template-parts/sections/section-cta' ); ?>

<?php endwhile;

get_footer();
