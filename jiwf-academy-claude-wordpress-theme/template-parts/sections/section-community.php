<?php
/**
 * Community / partner row (logos and city names).
 *
 * @package jiwf-academy
 */

$partners = new WP_Query( array(
	'post_type'      => 'partner',
	'posts_per_page' => 12,
) );
$lang = jiwf_current_lang();
?>
<section class="section section--ivory">
	<div class="container">
		<div class="section__head fade-up">
			<span class="eyebrow"><?php esc_html_e( 'Community', 'jiwf-academy' ); ?></span>
			<h2><?php echo $lang === 'ja' ? '共に歩むパートナー' : '<em>Our Community</em>'; ?></h2>
		</div>

		<div class="partner-row fade-up">
			<?php
			if ( $partners->have_posts() ) {
				while ( $partners->have_posts() ) {
					$partners->the_post();
					$logo = function_exists( 'get_field' ) ? get_field( 'logo' ) : null;
					if ( $logo && ! empty( $logo['url'] ) ) {
						printf( '<img src="%s" alt="%s" loading="lazy">', esc_url( $logo['url'] ), esc_attr( get_the_title() ) );
					} else {
						printf( '<span class="partner-row__city">%s</span>', esc_html( get_the_title() ) );
					}
				}
				wp_reset_postdata();
			} else {
				$cities = array( 'Tokyo', 'Mumbai', 'New Delhi', 'Yokohama', 'Kyoto' );
				foreach ( $cities as $c ) {
					printf( '<span class="partner-row__city"><em>%s</em></span>', esc_html( $c ) );
				}
			}
			?>
		</div>
	</div>
</section>
