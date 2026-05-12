<?php
/**
 * Programs preview — 3つの学びの柱 (home) or 5本の柱 (archive).
 *
 * On the front page we surface the three high-level pillars described in
 * the brand brief. On the program archive the full five-pillar grid is
 * shown by passing limit=5.
 *
 * @package jiwf-academy
 */

$limit = isset( $args['limit'] ) ? (int) $args['limit'] : 3;

// Home-page three-pillar shortcut.
if ( $limit === 3 ) {
	$pillars = array(
		array(
			'slug'    => 'gita-wisdom',
			'title'   => 'GITA Wisdom',
			'body'    => '人生の目的、倫理的行動、内なる明晰さを育む普遍の智慧を学びます。',
			'icon'    => 'lotus',
			'tone'    => 'rose',
		),
		array(
			'slug'    => 'yoga-wellbeing',
			'title'   => 'Yoga &amp; Wellbeing',
			'body'    => '身体・心・精神を整え、活力、しなやかさ、調和を育みます。',
			'icon'    => 'feather',
			'tone'    => 'gold',
		),
		array(
			'slug'    => 'leadership',
			'title'   => 'Leadership &amp; Social Impact',
			'body'    => 'リーダーシップ、起業家精神、社会変革の力を養います。',
			'icon'    => 'heart',
			'tone'    => 'sky',
		),
	);
	?>
	<section class="section section--ivory-warm">
		<div class="container">
			<div class="section__head fade-up">
				<span class="eyebrow">Our Programs</span>
				<h2 style="font-family: var(--font-jp-serif); font-weight: 500;">3つの学びの柱</h2>
			</div>

			<div class="card-grid card-grid--3">
				<?php foreach ( $pillars as $p ) :
					$post = get_page_by_path( $p['slug'], OBJECT, 'program' );
					$href = $post ? get_permalink( $post ) : get_post_type_archive_link( 'program' );
					?>
					<article class="card card--pillar fade-up">
						<span class="card__icon" data-tone="<?php echo esc_attr( $p['tone'] ); ?>"><?php echo jiwf_value_icon_svg( $p['icon'] ); ?></span>
						<h3 class="card__title"><a href="<?php echo esc_url( $href ); ?>"><?php echo wp_kses_post( $p['title'] ); ?></a></h3>
						<p class="card__excerpt"><?php echo esc_html( $p['body'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>

			<div style="text-align:center; margin-top: var(--space-2xl);">
				<a class="btn btn--outline" href="<?php echo esc_url( get_post_type_archive_link( 'program' ) ); ?>">
					すべてのプログラムを見る
				</a>
			</div>
		</div>
	</section>
	<?php
	return;
}

// Archive — surface every published program (up to $limit) from the CPT.
$grid = $limit >= 5 ? 'card-grid--5' : 'card-grid--3';

$query = new WP_Query( array(
	'post_type'      => 'program',
	'posts_per_page' => $limit,
	'orderby'        => 'menu_order title',
	'order'          => 'ASC',
) );

$icons = array(
	array( 'icon' => 'lotus',   'tone' => 'rose' ),
	array( 'icon' => 'feather', 'tone' => 'gold' ),
	array( 'icon' => 'heart',   'tone' => 'rose' ),
	array( 'icon' => 'globe',   'tone' => 'sky' ),
	array( 'icon' => 'sun',     'tone' => 'navy' ),
);
?>
<section class="section section--ivory-warm">
	<div class="container">
		<div class="section__head fade-up">
			<span class="eyebrow">Our Programs</span>
			<h2 style="font-family: var(--font-jp-serif); font-weight: 500;">智慧の5つの柱</h2>
		</div>

		<div class="card-grid <?php echo esc_attr( $grid ); ?>">
			<?php
			$i = 0;
			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) : $query->the_post();
					$meta = $icons[ $i ] ?? array( 'icon' => 'lotus', 'tone' => 'gold' );
					$i++;
					?>
					<article class="card card--pillar fade-up">
						<span class="card__icon" data-tone="<?php echo esc_attr( $meta['tone'] ); ?>"><?php echo jiwf_value_icon_svg( $meta['icon'] ); ?></span>
						<h3 class="card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?></p>
					</article>
				<?php endwhile; wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section>
