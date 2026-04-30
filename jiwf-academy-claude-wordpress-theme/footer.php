<?php
/**
 * Footer.
 *
 * @package jiwf-academy
 */
?>
</main>

<footer class="site-footer" role="contentinfo">
	<div class="site-footer__grid">
		<div class="footer-col footer-brand">
			<div class="footer-brand__title">JIWF Academy</div>
			<p class="footer-brand__statement"><?php echo esc_html( jiwf_brand_statement() ); ?></p>
		</div>

		<div class="footer-col">
			<h4 class="footer-col__title"><?php esc_html_e( 'Programs', 'jiwf-academy' ); ?></h4>
			<?php
			if ( has_nav_menu( 'footer' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'container'      => false,
					'depth'          => 1,
					'fallback_cb'    => false,
				) );
			} else {
				$pillars = get_terms( array( 'taxonomy' => 'program_pillar', 'hide_empty' => false ) );
				echo '<ul>';
				if ( ! is_wp_error( $pillars ) && $pillars ) {
					foreach ( $pillars as $term ) {
						printf( '<li><a href="%s">%s</a></li>', esc_url( get_term_link( $term ) ), esc_html( $term->name ) );
					}
				} else {
					$progs = array(
						__( 'GITA Wisdom', 'jiwf-academy' ),
						__( 'Yoga & Wellbeing', 'jiwf-academy' ),
						__( 'Leadership Development', 'jiwf-academy' ),
						__( 'Global Collaboration', 'jiwf-academy' ),
						__( 'Social Impact & Entrepreneurship', 'jiwf-academy' ),
					);
					foreach ( $progs as $p ) {
						printf( '<li><a href="%s">%s</a></li>', esc_url( get_post_type_archive_link( 'program' ) ), esc_html( $p ) );
					}
				}
				echo '</ul>';
			}
			?>
		</div>

		<div class="footer-col">
			<h4 class="footer-col__title"><?php esc_html_e( 'Discover', 'jiwf-academy' ); ?></h4>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'jiwf-academy' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/campus/' ) ); ?>"><?php esc_html_e( 'Locations', 'jiwf-academy' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/community/' ) ); ?>"><?php esc_html_e( 'Community', 'jiwf-academy' ); ?></a></li>
				<li><a href="<?php echo esc_url( get_post_type_archive_link( 'event' ) ); ?>"><?php esc_html_e( 'Events', 'jiwf-academy' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/journal/' ) ); ?>"><?php esc_html_e( 'Journal', 'jiwf-academy' ); ?></a></li>
			</ul>
		</div>

		<div class="footer-col footer-newsletter">
			<h4 class="footer-col__title"><?php esc_html_e( 'Stay in the Circle', 'jiwf-academy' ); ?></h4>
			<p class="footer-newsletter__intro">
				<?php esc_html_e( 'Quarterly notes from the Academy — events, essays, and invitations.', 'jiwf-academy' ); ?>
			</p>
			<?php
			$embed = jiwf_setting( 'jiwf_newsletter_embed', '' );
			if ( $embed ) {
				echo wp_kses_post( $embed );
			} else {
				?>
				<a class="btn btn--outline btn--on-dark" href="<?php echo esc_url( jiwf_contact_url() ); ?>">
					<?php esc_html_e( 'Subscribe', 'jiwf-academy' ); ?>
				</a>
				<?php
			}
			?>
		</div>
	</div>

	<div class="site-footer__base">
		<small>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> JIWF Academy. <?php esc_html_e( 'All rights reserved.', 'jiwf-academy' ); ?></small>

		<ul class="site-footer__legal">
			<?php
			if ( has_nav_menu( 'legal' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'legal',
					'container'      => false,
					'items_wrap'     => '%3$s',
					'depth'          => 1,
					'fallback_cb'    => false,
				) );
			} else {
				?>
				<li><a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>"><?php esc_html_e( 'Privacy', 'jiwf-academy' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms', 'jiwf-academy' ); ?></a></li>
				<?php
			}
			?>
		</ul>

		<ul class="site-footer__social">
			<?php
			$socials = jiwf_parse_pairs( jiwf_setting( 'jiwf_social_links', '' ) );
			foreach ( $socials as $s ) {
				printf(
					'<li><a href="%s" target="_blank" rel="noopener" aria-label="%s">%s</a></li>',
					esc_url( $s['url'] ),
					esc_attr( $s['label'] ),
					esc_html( strtoupper( substr( $s['label'], 0, 2 ) ) )
				);
			}
			?>
		</ul>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
