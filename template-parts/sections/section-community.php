<?php
/**
 * Community section — 志を共にする、世界の姉妹たち.
 *
 * @package jiwf-academy
 */
$partners = new WP_Query( array(
	'post_type'      => 'partner',
	'posts_per_page' => 12,
) );
?>
<section class="section section--ivory">
	<div class="container">
		<div class="section__head fade-up">
			<span class="eyebrow">Community</span>
			<h2 style="font-family: var(--font-jp-serif); font-weight: 500;">志を共にする、世界の姉妹たち</h2>
			<p class="lead" style="margin-top: var(--space-md);">
				起業家、経営者、教育者、チェンジメーカー。<br>
				世界中の女性たちがここでつながります。
			</p>
			<p class="lead" style="margin-top: var(--space-md); color: var(--jiwf-text-muted);">
				共に学び、共に成長し、共に未来を創ります。
			</p>
		</div>

		<div class="partner-row fade-up">
			<?php
			if ( $partners->have_posts() ) {
				while ( $partners->have_posts() ) {
					$partners->the_post();
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
