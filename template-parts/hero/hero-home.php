<?php
/**
 * Front-page hero — "From Fuji to Himalayas".
 *
 * @package jiwf-academy
 */
$tagline = jiwf_tagline();
$lang    = jiwf_current_lang();
$motto   = jiwf_setting( 'jiwf_motto', 'One Wisdom, One World' );

$hero_url = jiwf_setting( 'jiwf_home_hero_image' );
if ( ! $hero_url && file_exists( JIWF_THEME_DIR . '/assets/images/hero-fuji-himalaya.jpg' ) ) {
	$hero_url = jiwf_asset( 'images/hero-fuji-himalaya.jpg' );
}
?>
<section class="hero" aria-label="<?php esc_attr_e( 'Welcome to JIWF Academy', 'jiwf-academy' ); ?>">
	<div class="hero__media">
		<?php if ( $hero_url ) : ?>
			<img src="<?php echo esc_url( $hero_url ); ?>" alt="" fetchpriority="high" loading="eager">
		<?php else : ?>
			<div style="width:100%;height:100%;background:linear-gradient(180deg,#0A1628 0%,#14213D 50%,#2A3A5E 100%);"></div>
		<?php endif; ?>
	</div>
	<div class="hero__overlay"></div>

	<div class="hero__inner fade-in">
		<span class="hero__eyebrow">JIWF Academy &nbsp;·&nbsp; Japan India Women's Forum</span>

		<h1 class="hero__title">
			<em>From Fuji</em> <em>to Himalayas.</em>
		</h1>

		<p class="hero__title-jp">
			<?php
			echo $lang === 'ja'
				? 'ふたつの聖地から、ひとつの未来へ。'
				: 'From two sacred lands, toward one future.';
			?>
		</p>

		<p class="hero__tagline-pair">
			<span class="hero__tagline-en"><em><?php echo esc_html( $tagline['en'] ); ?></em></span>
			<span class="hero__tagline-jp"><?php echo esc_html( $tagline['jp'] ); ?></span>
		</p>

		<a class="hero__scroll" href="#statement">
			<span><?php esc_html_e( 'Discover', 'jiwf-academy' ); ?></span>
		</a>
	</div>

	<span class="hero__motto"><?php echo esc_html( $motto ); ?> ✦</span>
</section>
