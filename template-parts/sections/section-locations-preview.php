<?php
/**
 * Two-card locations preview (Fuji / Himalaya) on the home page.
 *
 * @package jiwf-academy
 */
$lang = jiwf_current_lang();

$fuji_url     = jiwf_setting( 'jiwf_home_fuji_image' )     ?: jiwf_asset( 'images/fuji.jpg' );
$himalaya_url = jiwf_setting( 'jiwf_home_himalaya_image' ) ?: jiwf_asset( 'images/himalaya.jpg' );
?>
<section class="section section--ivory">
	<div class="container">
		<div class="section__head fade-up">
			<span class="eyebrow"><?php esc_html_e( 'Our Locations', 'jiwf-academy' ); ?></span>
			<h2><?php echo $lang === 'ja' ? 'ふたつの聖地から' : '<em>From two sacred lands</em>'; ?></h2>
		</div>

		<div class="locations-preview">
			<a class="locations-preview__card fade-up" href="<?php echo esc_url( home_url( '/campus/' ) ); ?>">
				<div class="locations-preview__image">
					<img src="<?php echo esc_url( $fuji_url ); ?>" alt="<?php esc_attr_e( 'Mt. Fuji', 'jiwf-academy' ); ?>" loading="lazy">
				</div>
				<h3 class="locations-preview__country">
					<em>Fuji (Japan)</em>
					<small><?php esc_html_e( '富士', 'jiwf-academy' ); ?></small>
				</h3>
				<p class="locations-preview__caption">
					<?php
					echo $lang === 'ja'
						? '富士の麓での学びとリトリート。'
						: 'Learning and retreat at the foot of Mount Fuji.';
					?>
				</p>
			</a>
			<a class="locations-preview__card fade-up" href="<?php echo esc_url( home_url( '/campus/' ) ); ?>">
				<div class="locations-preview__image">
					<img src="<?php echo esc_url( $himalaya_url ); ?>" alt="<?php esc_attr_e( 'Himalayas', 'jiwf-academy' ); ?>" loading="lazy">
				</div>
				<h3 class="locations-preview__country">
					<em>Himalayas (India)</em>
					<small><?php esc_html_e( 'ヒマラヤ', 'jiwf-academy' ); ?></small>
				</h3>
				<p class="locations-preview__caption">
					<?php
					echo $lang === 'ja'
						? 'ヒマラヤの聖地での内観と探求。'
						: 'Inner inquiry within the embrace of the Himalayas.';
					?>
				</p>
			</a>
		</div>
	</div>
</section>
