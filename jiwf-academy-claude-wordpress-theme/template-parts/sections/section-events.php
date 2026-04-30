<?php
/**
 * Latest events (3 cards).
 *
 * @package jiwf-academy
 */
$lang = jiwf_current_lang();
$events = new WP_Query( array(
	'post_type'      => 'event',
	'posts_per_page' => 3,
	'meta_key'       => 'event_date_start',
	'orderby'        => 'meta_value',
	'order'          => 'ASC',
	'meta_query'     => array(
		array(
			'key'     => 'event_date_start',
			'value'   => current_time( 'Y-m-d H:i:s' ),
			'compare' => '>=',
			'type'    => 'DATETIME',
		),
	),
) );
?>
<section class="section section--ivory-warm">
	<div class="container">
		<div class="section__head fade-up">
			<span class="eyebrow"><?php esc_html_e( 'Upcoming', 'jiwf-academy' ); ?></span>
			<h2><?php echo $lang === 'ja' ? 'お知らせ・イベント' : '<em>Events &amp; Notes</em>'; ?></h2>
		</div>

		<div class="card-grid card-grid--3">
			<?php
			if ( $events->have_posts() ) {
				while ( $events->have_posts() ) {
					$events->the_post();
					get_template_part( 'template-parts/cards/card-event' );
				}
				wp_reset_postdata();
			} else {
				echo '<p style="grid-column: 1/-1; text-align:center; color: var(--jiwf-text-muted);">' . esc_html__( 'New events will be announced here soon.', 'jiwf-academy' ) . '</p>';
			}
			?>
		</div>
	</div>
</section>
