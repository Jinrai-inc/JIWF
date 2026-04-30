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
	$portrait = function_exists( 'get_field' ) ? get_field( 'portrait' )   : null;
	$title    = function_exists( 'get_field' ) ? get_field( 'title' )      : '';
	$name_jp  = function_exists( 'get_field' ) ? get_field( 'name_jp' )    : '';
	$bio_short = function_exists( 'get_field' ) ? get_field( 'bio_short' ) : '';
	$bio_long  = function_exists( 'get_field' ) ? get_field( 'bio_long' )  : '';
	$socials   = function_exists( 'get_field' ) ? get_field( 'social_links' ) : array();
	?>

	<section class="section section--ivory-warm" style="padding-top: calc(var(--header-height) + var(--space-2xl));">
		<div class="container">
			<div class="split split--narrow">
				<div class="image-frame fade-up" style="aspect-ratio: 3/4;">
					<?php
					if ( $portrait && ! empty( $portrait['url'] ) ) {
						printf( '<img src="%s" alt="%s">', esc_url( $portrait['url'] ), esc_attr( get_the_title() ) );
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
					<?php if ( $socials && is_array( $socials ) ) : ?>
						<ul style="display:flex; gap:var(--space-md); list-style:none; padding:0; margin-top:var(--space-md);">
							<?php foreach ( $socials as $s ) : if ( empty( $s['url'] ) ) continue; ?>
								<li><a class="btn btn--ghost" href="<?php echo esc_url( $s['url'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $s['label'] ); ?></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<?php if ( $bio_long || get_the_content() ) : ?>
	<article class="section section--ivory">
		<div class="container container--narrow entry-content fade-up">
			<?php
			if ( $bio_long ) {
				echo wp_kses_post( $bio_long );
			} else {
				the_content();
			}
			?>
		</div>
	</article>
	<?php endif; ?>

	<?php
endwhile;

get_footer();
