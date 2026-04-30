<?php
/**
 * Header.
 *
 * @package jiwf-academy
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'jiwf-academy' ); ?></a>

<header class="site-header" role="banner">
	<div class="site-header__inner">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-brand" rel="home">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<span>
					JIWF Academy
					<span class="site-brand__sub">One Wisdom · One World</span>
				</span>
			<?php endif; ?>
		</a>

		<nav class="primary-nav" aria-label="<?php esc_attr_e( 'Primary', 'jiwf-academy' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'primary-nav__list',
					'container'      => false,
					'depth'          => 2,
					'fallback_cb'    => false,
				) );
			} else {
				echo '<ul class="primary-nav__list">';
				$default_links = array(
					'/'           => __( 'Home', 'jiwf-academy' ),
					'/about/'     => __( 'About', 'jiwf-academy' ),
					'/programs/'  => __( 'Programs', 'jiwf-academy' ),
					'/campus/'    => __( 'Locations', 'jiwf-academy' ),
					'/community/' => __( 'Community', 'jiwf-academy' ),
					'/events/'    => __( 'Events', 'jiwf-academy' ),
					'/contact/'   => __( 'Contact', 'jiwf-academy' ),
				);
				foreach ( $default_links as $url => $label ) {
					printf( '<li><a href="%s">%s</a></li>', esc_url( home_url( $url ) ), esc_html( $label ) );
				}
				echo '</ul>';
			}
			?>
		</nav>

		<div class="site-header__actions">
			<?php jiwf_language_switcher(); ?>
			<?php jiwf_cta_button(); ?>
		</div>

		<button class="nav-toggle" type="button" aria-controls="primary-nav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'jiwf-academy' ); ?>">
			<span class="nav-toggle__bar"></span>
			<span class="nav-toggle__bar"></span>
			<span class="nav-toggle__bar"></span>
		</button>
	</div>
</header>

<main id="main" class="site-main" role="main">
