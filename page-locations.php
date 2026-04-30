<?php
/**
 * Template Name: Locations
 *
 * @package jiwf-academy
 */

get_header();
$lang = jiwf_current_lang();

$locations = new WP_Query( array(
	'post_type'      => 'location',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order title',
	'order'          => 'ASC',
) );
?>

<?php get_template_part( 'template-parts/hero/hero-page', null, array(
	'eyebrow' => __( 'Locations', 'jiwf-academy' ),
	'title'   => $lang === 'ja' ? '日本・インドの2大拠点' : 'Two campuses, one wisdom.',
	'lead'    => $lang === 'ja'
		? '富士の麓と、ヒマラヤの懐に。私たちの学びは2つの聖地から始まります。'
		: 'At the foot of Mount Fuji and within the Himalayas — our learning begins in two sacred lands.',
) ); ?>

<section class="section section--ivory">
	<div class="container">
		<div class="locations">
			<?php
			if ( $locations->have_posts() ) {
				while ( $locations->have_posts() ) {
					$locations->the_post();
					$country = jiwf_field( 'country' );
					$tagline = jiwf_field( 'tagline' );
					$hero_id = (int) jiwf_field( 'hero_image_id' );
					?>
					<article class="location-card fade-up">
						<?php if ( $country ) : ?>
							<span class="location-card__country"><?php echo esc_html( $country ); ?></span>
						<?php endif; ?>
						<h2 class="location-card__title"><?php the_title(); ?></h2>
						<div class="location-card__image">
							<?php
							if ( $hero_id ) {
								echo wp_get_attachment_image( $hero_id, 'jiwf-card', false, array( 'loading' => 'lazy', 'alt' => get_the_title() ) );
							} elseif ( has_post_thumbnail() ) {
								the_post_thumbnail( 'jiwf-card', array( 'loading' => 'lazy' ) );
							}
							?>
						</div>
						<?php if ( $tagline ) : ?>
							<p class="lead"><?php echo esc_html( $tagline ); ?></p>
						<?php endif; ?>
						<div class="entry-content"><?php the_content(); ?></div>
					</article>
					<?php
				}
				wp_reset_postdata();
			} else {
				// Editorial placeholder.
				?>
				<article class="location-card fade-up">
					<span class="location-card__country">Japan</span>
					<h2 class="location-card__title"><?php echo $lang === 'ja' ? '富士の麓・横浜' : 'At the foot of Mount Fuji — Yokohama'; ?></h2>
					<div class="location-card__image" style="background:linear-gradient(180deg,var(--jiwf-sky-soft) 0%,var(--jiwf-ivory-warm) 100%);"></div>
					<p class="lead"><?php echo $lang === 'ja' ? '静謐な学びの場。' : 'A place of stillness and study.'; ?></p>
				</article>
				<article class="location-card fade-up">
					<span class="location-card__country">India</span>
					<h2 class="location-card__title"><?php echo $lang === 'ja' ? 'ヒマラヤの懐' : 'Within the embrace of the Himalayas'; ?></h2>
					<div class="location-card__image" style="background:linear-gradient(180deg,var(--jiwf-rose) 0%,var(--jiwf-ivory-warm) 100%);"></div>
					<p class="lead"><?php echo $lang === 'ja' ? '叡智の源泉に触れる場。' : 'A place to touch the source of wisdom.'; ?></p>
				</article>
				<?php
			}
			?>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/sections/section-cta' ); ?>

<?php get_footer();
