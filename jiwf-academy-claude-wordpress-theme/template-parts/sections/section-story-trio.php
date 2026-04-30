<?php
/**
 * Three-image visual story (Stillness / Wisdom / Grandeur).
 *
 * @package jiwf-academy
 */
$lang = jiwf_current_lang();
$items = array(
	array(
		'image_id' => function_exists( 'get_field' ) ? get_field( 'home_story_image_1', 'option' ) : 0,
		'label_en' => 'Stillness',
		'label_jp' => '静謐',
	),
	array(
		'image_id' => function_exists( 'get_field' ) ? get_field( 'home_story_image_2', 'option' ) : 0,
		'label_en' => 'Wisdom',
		'label_jp' => '智慧',
	),
	array(
		'image_id' => function_exists( 'get_field' ) ? get_field( 'home_story_image_3', 'option' ) : 0,
		'label_en' => 'Grandeur',
		'label_jp' => '壮大',
	),
);
?>
<section class="section section--ivory-warm">
	<div class="container">
		<div class="story-trio">
			<?php foreach ( $items as $item ) : ?>
				<figure class="story-trio__item fade-up">
					<div class="story-trio__image">
						<?php
						if ( $item['image_id'] ) {
							echo wp_get_attachment_image( $item['image_id'], 'jiwf-card', false, array( 'alt' => $item['label_en'] ) );
						} else {
							echo '<div style="width:100%;height:100%;background:linear-gradient(180deg,var(--jiwf-sky-soft) 0%, var(--jiwf-ivory-warm) 100%);"></div>';
						}
						?>
					</div>
					<figcaption class="story-trio__label">
						<em><?php echo esc_html( $item['label_en'] ); ?></em>
						<small><?php echo esc_html( $item['label_jp'] ); ?></small>
					</figcaption>
				</figure>
			<?php endforeach; ?>
		</div>
	</div>
</section>
