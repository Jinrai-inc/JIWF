<?php
/**
 * Programs preview (3 pillars on home; full 5 on archive variant).
 *
 * @package jiwf-academy
 */

$lang  = jiwf_current_lang();
$limit = isset( $args['limit'] ) ? (int) $args['limit'] : 3;

$query = new WP_Query( array(
	'post_type'      => 'program',
	'posts_per_page' => $limit,
	'orderby'        => 'menu_order title',
	'order'          => 'ASC',
) );
?>
<section class="section section--ivory">
	<div class="container">
		<div class="section__head fade-up">
			<span class="eyebrow"><?php esc_html_e( 'Five Pillars of Wisdom', 'jiwf-academy' ); ?></span>
			<h2><?php echo $lang === 'ja' ? 'プログラム' : '<em>Programs</em>'; ?></h2>
			<p class="lead">
				<?php
				echo $lang === 'ja'
					? '東洋の智慧と現代の実践を結ぶ、5つの学びの柱。'
					: 'Five pillars where ancient wisdom meets modern practice.';
				?>
			</p>
		</div>

		<div class="card-grid card-grid--3">
			<?php
			$i = 0;
			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) :
					$query->the_post();
					$i++;
					$subtitle = function_exists( 'get_field' ) ? get_field( 'subtitle' ) : '';
					?>
					<article class="card fade-up">
						<span class="card__chapter"><?php echo esc_html( jiwf_roman( $i ) ); ?></span>
						<h3 class="card__title"><?php the_title(); ?></h3>
						<?php if ( $subtitle ) : ?>
							<p class="card__meta"><?php echo esc_html( $subtitle ); ?></p>
						<?php endif; ?>
						<p class="card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 32 ) ); ?></p>
						<a class="card__cta" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Explore', 'jiwf-academy' ); ?></a>
					</article>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				// Editorial placeholder when no programs are published yet.
				$placeholders = array(
					array( 'GITA Wisdom', '人生の目的、倫理的行動、内なる明晰さを育む普遍の智慧。' ),
					array( 'Yoga & Wellbeing', '身体・心・精神を整え、活力、しなやかさ、調和を育みます。' ),
					array( 'Leadership', 'リーダーシップ、起業家精神、社会変革の力を育む。' ),
				);
				foreach ( $placeholders as $idx => $p ) :
					?>
					<article class="card fade-up">
						<span class="card__chapter"><?php echo esc_html( jiwf_roman( $idx + 1 ) ); ?></span>
						<h3 class="card__title"><?php echo esc_html( $p[0] ); ?></h3>
						<p class="card__excerpt"><?php echo esc_html( $p[1] ); ?></p>
						<span class="card__cta"><?php esc_html_e( 'Coming soon', 'jiwf-academy' ); ?></span>
					</article>
				<?php
				endforeach;
			endif;
			?>
		</div>

		<div style="text-align:center; margin-top: var(--space-2xl);">
			<a class="btn btn--outline" href="<?php echo esc_url( get_post_type_archive_link( 'program' ) ); ?>">
				<?php esc_html_e( 'All Programs', 'jiwf-academy' ); ?>
			</a>
		</div>
	</div>
</section>
