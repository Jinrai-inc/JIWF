<?php
/**
 * Closing CTA — bridges Phase 1 to Contact / Newsletter / Partner outreach.
 *
 * @package jiwf-academy
 */
$lang = jiwf_current_lang();
?>
<section class="closing-cta">
	<div class="container container--narrow fade-up">
		<h2>
			<?php
			echo $lang === 'ja'
				? '女性が自らを変え、世界を変える'
				: '<em>Women rising — reshaping themselves, reshaping the world.</em>';
			?>
		</h2>
		<p class="lead">
			<?php
			echo $lang === 'ja'
				? '未来は、智慧と慈愛、そして使命を持って行動する人のものです。'
				: 'The future belongs to those who act with wisdom, compassion, and purpose.';
			?>
		</p>
		<div class="closing-cta__actions">
			<a class="btn btn--outline btn--on-dark" href="<?php echo esc_url( jiwf_contact_url() ); ?>">
				<?php esc_html_e( 'Contact', 'jiwf-academy' ); ?>
			</a>
			<a class="btn btn--outline btn--on-dark" href="<?php echo esc_url( jiwf_contact_url() . '?topic=newsletter' ); ?>">
				<?php esc_html_e( 'Newsletter', 'jiwf-academy' ); ?>
			</a>
			<a class="btn btn--outline btn--on-dark" href="<?php echo esc_url( jiwf_contact_url() . '?topic=partnership' ); ?>">
				<?php esc_html_e( 'Partner With Us', 'jiwf-academy' ); ?>
			</a>
		</div>
	</div>
</section>
