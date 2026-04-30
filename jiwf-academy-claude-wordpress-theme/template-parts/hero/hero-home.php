<?php
/**
 * Front-page hero (full-screen cinematic).
 *
 * @package jiwf-academy
 */

$tagline = jiwf_tagline();
$lang    = jiwf_current_lang();
?>
<section class="hero" aria-label="<?php esc_attr_e( 'Welcome to JIWF Academy', 'jiwf-academy' ); ?>">
	<div class="hero__media">
		<?php
		$hero_id = function_exists( 'get_field' ) ? get_field( 'home_hero_image', 'option' ) : 0;
		if ( $hero_id ) {
			echo wp_get_attachment_image( $hero_id, 'jiwf-hero', false, array(
				'fetchpriority' => 'high',
				'loading'       => 'eager',
				'alt'           => '',
			) );
		} else {
			// Subtle gradient placeholder until imagery is provided.
			echo '<div style="width:100%;height:100%;background:linear-gradient(180deg,#0A1628 0%,#14213D 50%,#2A3A5E 100%);"></div>';
		}
		?>
	</div>
	<div class="hero__overlay"></div>

	<div class="hero__inner fade-in">
		<span class="hero__eyebrow">JIWF Academy</span>

		<?php if ( $lang === 'ja' ) : ?>
			<h1 class="hero__title">
				<em>Live the Wisdom.</em><br>
				<em>Create the Future.</em>
			</h1>
			<p class="hero__title-jp">智慧を生き、未来を創る。</p>
		<?php else : ?>
			<h1 class="hero__title">
				<em>Live the Wisdom.</em><br>
				<em>Create the Future.</em>
			</h1>
			<p class="hero__title-jp"><?php echo esc_html( $tagline['jp'] ); ?></p>
		<?php endif; ?>

		<a class="hero__scroll" href="#statement">
			<span><?php esc_html_e( 'Discover', 'jiwf-academy' ); ?></span>
		</a>
	</div>

	<span class="hero__motto">One Wisdom, One World ✦</span>
</section>
