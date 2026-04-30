<?php
/**
 * Programs preview — Five Pillars of Wisdom.
 *
 * @package jiwf-academy
 */

$lang  = jiwf_current_lang();
$limit = isset( $args['limit'] ) ? (int) $args['limit'] : 5;
$grid  = $limit >= 5 ? 'card-grid--5' : 'card-grid--3';

$query = new WP_Query( array(
	'post_type'      => 'program',
	'posts_per_page' => $limit,
	'orderby'        => 'menu_order title',
	'order'          => 'ASC',
) );

// Default placeholders (used when no programs are published yet).
$placeholders = array(
	array(
		'title_en' => 'GITA Wisdom',
		'title_jp' => 'バガヴァッド・ギーターの知恵を日常に生かす',
		'icon'     => 'lotus',
		'tone'     => 'rose',
	),
	array(
		'title_en' => 'Yoga & Well-being',
		'title_jp' => 'ヨガ・呼吸法・アーユルヴェーダで心身のバランスを整える',
		'icon'     => 'feather',
		'tone'     => 'gold',
	),
	array(
		'title_en' => 'Leadership Development',
		'title_jp' => '女性リーダーシップ・コミュニケーション・マインドセットを育成',
		'icon'     => 'heart',
		'tone'     => 'rose',
	),
	array(
		'title_en' => 'Global Collaboration',
		'title_jp' => '日本とインド、そして世界をつなぐネットワークと共創の場',
		'icon'     => 'globe',
		'tone'     => 'sky',
	),
	array(
		'title_en' => 'Social Impact &amp; Entrepreneurship',
		'title_jp' => '社会課題を解決し、持続可能な未来を創る力を育てる',
		'icon'     => 'sun',
		'tone'     => 'navy',
	),
);
?>
<section class="section section--ivory-warm">
	<div class="container">
		<div class="section__head fade-up">
			<span class="eyebrow"><?php esc_html_e( 'Our Programs', 'jiwf-academy' ); ?></span>
			<h2><?php echo $lang === 'ja' ? '智慧の5つの柱' : '<em>Five Pillars of Wisdom</em>'; ?></h2>
		</div>

		<div class="card-grid <?php echo esc_attr( $grid ); ?>">
			<?php
			$i = 0;
			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) :
					$query->the_post();
					$i++;
					$icon = $placeholders[ $i - 1 ]['icon'] ?? 'lotus';
					$tone = $placeholders[ $i - 1 ]['tone'] ?? 'gold';
					?>
					<article class="card card--pillar fade-up">
						<span class="card__icon" data-tone="<?php echo esc_attr( $tone ); ?>"><?php echo jiwf_value_icon_svg( $icon ); ?></span>
						<h3 class="card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?></p>
					</article>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				foreach ( $placeholders as $idx => $p ) :
					if ( $idx >= $limit ) break;
					?>
					<article class="card card--pillar fade-up">
						<span class="card__icon" data-tone="<?php echo esc_attr( $p['tone'] ); ?>"><?php echo jiwf_value_icon_svg( $p['icon'] ); ?></span>
						<h3 class="card__title"><?php echo wp_kses_post( $p['title_en'] ); ?></h3>
						<p class="card__excerpt" style="font-family: var(--font-jp-body);"><?php echo esc_html( $p['title_jp'] ); ?></p>
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
