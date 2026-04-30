<?php
/**
 * Single Faculty.
 *
 * @package jiwf-academy
 */

get_header();
$lang = jiwf_current_lang();

while ( have_posts() ) :
	the_post();
	$portrait_id = (int) jiwf_field( 'portrait_id' );
	$title       = jiwf_field( 'role_title' );
	$name_jp     = jiwf_field( 'name_jp' );
	$bio_short   = jiwf_field( 'bio_short' );
	$socials     = jiwf_parse_pairs( jiwf_field( 'social_links' ) );
	?>

	<section class="section section--ivory-warm" style="padding-top: calc(var(--header-height) + var(--space-2xl));">
		<div class="container">
			<div class="split split--narrow">
				<div class="image-frame fade-up" style="aspect-ratio: 3/4;">
					<?php
					if ( $portrait_id ) {
						echo wp_get_attachment_image( $portrait_id, 'jiwf-portrait', false, array( 'alt' => get_the_title() ) );
					} elseif ( has_post_thumbnail() ) {
						the_post_thumbnail( 'jiwf-portrait' );
					}
					?>
				</div>
				<div class="fade-up">
					<?php if ( $title ) : ?>
						<span class="eyebrow"><?php echo esc_html( $title ); ?></span>
					<?php endif; ?>
					<h1 style="margin-top: var(--space-md);"><?php the_title(); ?></h1>
					<?php if ( $name_jp ) : ?>
						<p style="font-family: var(--font-jp-serif); color: var(--jiwf-text-muted); letter-spacing: 0.1em;"><?php echo esc_html( $name_jp ); ?></p>
					<?php endif; ?>
					<?php if ( $bio_short ) : ?>
						<p class="lead" style="margin-top: var(--space-md);"><?php echo esc_html( $bio_short ); ?></p>
					<?php endif; ?>
					<?php if ( $socials ) : ?>
						<ul style="display:flex; gap:var(--space-md); list-style:none; padding:0; margin-top:var(--space-md);">
							<?php foreach ( $socials as $s ) : ?>
								<li><a class="btn btn--ghost" href="<?php echo esc_url( $s['url'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $s['label'] ); ?></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<?php if ( get_the_content() ) : ?>
	<article class="section section--ivory">
		<div class="container container--narrow entry-content fade-up">
			<?php the_content(); ?>
		</div>
	</article>
	<?php endif; ?>

	<?php
endwhile;

get_footer();
