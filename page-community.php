<?php
/**
 * Template Name: Community
 *
 * @package jiwf-academy
 */

get_header();
$lang = jiwf_current_lang();

$partner_types = get_terms( array( 'taxonomy' => 'partner_type', 'hide_empty' => false ) );
?>

<?php get_template_part( 'template-parts/hero/hero-page', null, array(
	'eyebrow'       => __( 'Community', 'jiwf-academy' ),
	'title'         => $lang === 'ja' ? '共に歩むパートナーたち' : 'Walking together.',
	'lead'          => $lang === 'ja'
		? 'JIWF Academyを支える、世界中のパートナー・スポンサー。'
		: 'A worldwide circle of partners and sponsors who walk with JIWF Academy.',
	'image_setting' => 'jiwf_page_hero_community',
) ); ?>

<section class="section section--ivory">
	<div class="container">
		<?php
		if ( ! is_wp_error( $partner_types ) && $partner_types ) {
			foreach ( $partner_types as $type ) :
				$q = new WP_Query( array(
					'post_type' => 'partner',
					'tax_query' => array( array( 'taxonomy' => 'partner_type', 'field' => 'term_id', 'terms' => $type->term_id ) ),
					'posts_per_page' => -1,
				) );
				if ( ! $q->have_posts() ) continue;
				?>
				<div class="section__head fade-up" style="margin-top: var(--space-2xl);">
					<span class="eyebrow"><?php echo esc_html( $type->name ); ?></span>
				</div>
				<div class="partner-row fade-up">
					<?php
					while ( $q->have_posts() ) {
						$q->the_post();
						$logo_id = (int) jiwf_field( 'logo_id' );
						if ( $logo_id ) {
							echo wp_get_attachment_image( $logo_id, 'medium', false, array( 'loading' => 'lazy', 'alt' => get_the_title() ) );
						} elseif ( has_post_thumbnail() ) {
							the_post_thumbnail( 'medium', array( 'loading' => 'lazy' ) );
						} else {
							printf( '<span class="partner-row__city">%s</span>', esc_html( get_the_title() ) );
						}
					}
					wp_reset_postdata();
					?>
				</div>
			<?php
			endforeach;
		} else {
			get_template_part( 'template-parts/sections/section-community' );
		}
		?>

		<div class="entry-content fade-up" style="margin-top: var(--space-2xl);">
			<?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/sections/section-cta' ); ?>

<?php get_footer();
