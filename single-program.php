<?php
/**
 * Single Program — auto hero + Gutenberg body + dynamic faculty + CTA.
 *
 * Editorial sections (curriculum, audience, what awaits, etc.) are
 * composed inside the program post body using Gutenberg patterns:
 *   • "Statement" / "Mission · Vision · Values"
 *   • "Timeline" (handy for curriculum modules)
 *   • Any heading + paragraph + columns combo
 *
 * Structured data lives in the meta box: subtitle, hero image, related
 * faculty IDs (used by the auto-rendered Faculty grid and CTA).
 *
 * @package jiwf-academy
 */

get_header();
$lang = jiwf_current_lang();

while ( have_posts() ) :
	the_post();

	$subtitle  = jiwf_field( 'subtitle' );
	$hero_id   = (int) jiwf_field( 'hero_image_id' );
	$hero_url  = $hero_id ? wp_get_attachment_image_url( $hero_id, 'jiwf-hero' ) : '';
	$faculty_ids_raw = jiwf_field( 'faculty_ids' );
	$faculty   = array_filter( array_map( 'absint', preg_split( '/[\s,]+/', (string) $faculty_ids_raw ) ) );
	$has_blocks = has_blocks( get_post() );

	$hero_style = $hero_url
		? 'background-image: linear-gradient(180deg, rgba(20,33,61,0.4) 0%, rgba(20,33,61,0.7) 100%), url(' . esc_url( $hero_url ) . '); background-size: cover; background-position: center; color: var(--jiwf-ivory);'
		: '';
	?>

	<section class="page-hero<?php echo $hero_url ? ' page-hero--image' : ''; ?>"<?php echo $hero_style ? ' style="' . esc_attr( $hero_style ) . '"' : ''; ?>>
		<div class="container">
			<span class="page-hero__eyebrow"><?php esc_html_e( 'Program', 'jiwf-academy' ); ?></span>
			<h1 class="page-hero__title"><?php the_title(); ?></h1>
			<?php if ( $subtitle ) : ?>
				<p class="page-hero__lead"><?php echo esc_html( $subtitle ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<?php if ( $has_blocks ) : ?>
		<div class="entry__content"><?php the_content(); ?></div>
	<?php else : ?>
		<section class="section section--ivory">
			<div class="container container--narrow entry-content fade-up"><?php the_content(); ?></div>
		</section>
	<?php endif; ?>

	<?php if ( $faculty ) : ?>
	<section class="section section--ivory-warm">
		<div class="container">
			<div class="section__head fade-up">
				<span class="eyebrow"><?php esc_html_e( 'Faculty', 'jiwf-academy' ); ?></span>
				<h2><?php echo $lang === 'ja' ? '講師' : '<em>Your Teachers</em>'; ?></h2>
			</div>
			<div class="card-grid card-grid--3">
				<?php foreach ( $faculty as $fid ) :
					$post = get_post( $fid );
					if ( ! $post ) continue;
					setup_postdata( $post );
					get_template_part( 'template-parts/cards/card-faculty' );
				endforeach; wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<section class="section section--navy">
		<div class="container container--narrow" style="text-align:center;">
			<h2 style="color: var(--jiwf-ivory); margin-bottom: var(--space-md);">
				<?php echo $lang === 'ja' ? '<em>このプログラムについて</em>' : '<em>Take the next step</em>'; ?>
			</h2>
			<p class="lead" style="color: rgba(250,247,240,0.8); margin-bottom: var(--space-xl);">
				<?php
				echo $lang === 'ja'
					? 'お申込み・ご質問は、お問い合わせフォームよりお気軽にどうぞ。'
					: 'For applications and enquiries, please reach out through our contact form.';
				?>
			</p>
			<?php
			$cta_url = add_query_arg( 'program', rawurlencode( get_the_title() ), jiwf_contact_url() );
			jiwf_cta_button( $lang === 'ja' ? 'お問い合わせ' : 'Contact Us', $cta_url, 'btn--on-dark' );
			?>
		</div>
	</section>

	<?php
endwhile;

get_footer();
