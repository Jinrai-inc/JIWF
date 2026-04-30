<?php
/**
 * Three-image visual story (Stillness / Wisdom / Grandeur).
 * Uses Customizer images, falling back to bundled theme defaults.
 *
 * @package jiwf-academy
 */
$lang = jiwf_current_lang();

$items = array(
	array(
		'src'       => jiwf_setting( 'jiwf_home_fuji_image' )      ?: jiwf_asset( 'images/fuji.jpg' ),
		'label_en'  => 'Stillness',
		'label_jp'  => '静謐',
	),
	array(
		'src'       => jiwf_setting( 'jiwf_home_about_image' )     ?: jiwf_asset( 'images/learning.jpg' ),
		'label_en'  => 'Wisdom',
		'label_jp'  => '智慧',
	),
	array(
		'src'       => jiwf_setting( 'jiwf_home_himalaya_image' )  ?: jiwf_asset( 'images/himalaya.jpg' ),
		'label_en'  => 'Grandeur',
		'label_jp'  => '壮大',
	),
);
?>
<section class="section section--ivory-warm">
	<div class="container">
		<div class="story-trio">
			<?php foreach ( $items as $item ) : ?>
				<figure class="story-trio__item fade-up">
					<div class="story-trio__image">
						<img src="<?php echo esc_url( $item['src'] ); ?>" alt="<?php echo esc_attr( $item['label_en'] ); ?>" loading="lazy">
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
