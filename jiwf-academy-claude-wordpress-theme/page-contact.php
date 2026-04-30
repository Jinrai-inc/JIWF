<?php
/**
 * Template Name: Contact
 *
 * @package jiwf-academy
 */

get_header();
$lang = jiwf_current_lang();
?>

<?php get_template_part( 'template-parts/hero/hero-page', null, array(
	'eyebrow' => __( 'Contact', 'jiwf-academy' ),
	'title'   => $lang === 'ja' ? 'あなたの旅を、ここから' : 'Your journey begins here.',
	'lead'    => $lang === 'ja'
		? 'プログラム、イベント、パートナーシップ、メディア取材など、お気軽にお問い合わせください。'
		: 'Reach out for programs, events, partnerships, or media inquiries — we read every message.',
) ); ?>

<section class="section section--ivory">
	<div class="container">
		<div class="split">
			<div class="fade-up">
				<h2 style="margin-bottom: var(--space-md);">
					<?php echo $lang === 'ja' ? '<em>One letter</em><br>at a time.' : '<em>One letter</em><br>at a time.'; ?>
				</h2>
				<p class="lead" style="color: var(--jiwf-text-muted);">
					<?php
					echo $lang === 'ja'
						? '私たちは、すべてのお手紙を大切に拝読します。お返事まで数日いただく場合があります。'
						: 'We read every letter with care. Responses may take a few days.';
					?>
				</p>
				<?php
				$email = function_exists( 'get_field' ) ? get_field( 'contact_email', 'option' ) : '';
				if ( $email ) :
					?>
					<p style="margin-top: var(--space-lg);">
						<a class="btn btn--ghost" href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
					</p>
				<?php endif; ?>
			</div>

			<div class="fade-up">
				<?php
				while ( have_posts() ) :
					the_post();
					the_content(); // Place [contact-form-7] shortcode in the page content.
				endwhile;
				?>
			</div>
		</div>
	</div>
</section>
<?php get_footer();
