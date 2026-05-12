<?php
/**
 * Front-page hero — 智慧を生き、未来を創る。
 *
 * @package jiwf-academy
 */
$motto    = jiwf_setting( 'jiwf_motto', 'One Wisdom, One World' );
$has_hero = jiwf_has_image( 'jiwf_home_hero_image', 'images/hero-fuji-himalaya.jpg' );
?>
<section class="hero" aria-label="<?php esc_attr_e( 'Welcome to JIWF Academy', 'jiwf-academy' ); ?>">
	<div class="hero__media">
		<?php if ( $has_hero ) : ?>
			<?php
			jiwf_image(
				'jiwf_home_hero_image',
				'jiwf-hero',
				array( 'alt' => '', 'fetchpriority' => 'high', 'loading' => 'eager' ),
				'images/hero-fuji-himalaya.jpg'
			);
			?>
		<?php else : ?>
			<div style="width:100%;height:100%;background:linear-gradient(180deg,#0A1628 0%,#14213D 50%,#2A3A5E 100%);"></div>
		<?php endif; ?>
	</div>
	<div class="hero__overlay"></div>

	<div class="hero__inner fade-in">
		<span class="hero__eyebrow">JIWF ACADEMY &nbsp;·&nbsp; <?php echo esc_html( $motto ); ?></span>

		<h1 class="hero__title hero__title--jp">智慧を生き、未来を創る。</h1>

		<a class="hero__scroll" href="#statement">
			<span><?php esc_html_e( 'Discover', 'jiwf-academy' ); ?></span>
		</a>
	</div>

	<span class="hero__motto"><?php echo esc_html( $motto ); ?> ✦</span>
</section>
