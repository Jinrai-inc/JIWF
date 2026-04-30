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
				/*
				 * No menu has been assigned yet. Resolve each link from real
				 * WP entities so we never link to a 404, and skip anything
				 * that hasn't been published yet.
				 */
				$nav_items = array(
					array( 'page' => 'about',     'label' => __( 'About', 'jiwf-academy' ) ),
					array( 'cpt'  => 'program',   'label' => __( 'Programs', 'jiwf-academy' ) ),
					array( 'page' => 'campus',    'label' => __( 'Locations', 'jiwf-academy' ) ),
					array( 'page' => 'community', 'label' => __( 'Community', 'jiwf-academy' ) ),
					array( 'cpt'  => 'event',     'label' => __( 'Events', 'jiwf-academy' ) ),
					array( 'page' => 'contact',   'label' => __( 'Contact', 'jiwf-academy' ) ),
				);

				$rendered = array();
				foreach ( $nav_items as $item ) {
					if ( ! empty( $item['page'] ) ) {
						$page = get_page_by_path( $item['page'], OBJECT, 'page' );
						if ( ! $page || $page->post_status !== 'publish' ) continue;
						$rendered[] = sprintf(
							'<li><a href="%s">%s</a></li>',
							esc_url( get_permalink( $page ) ),
							esc_html( $item['label'] )
						);
					} elseif ( ! empty( $item['cpt'] ) ) {
						$url = get_post_type_archive_link( $item['cpt'] );
						if ( ! $url ) continue;
						$rendered[] = sprintf(
							'<li><a href="%s">%s</a></li>',
							esc_url( $url ),
							esc_html( $item['label'] )
						);
					}
				}

				if ( $rendered ) {
					echo '<ul class="primary-nav__list">' . implode( '', $rendered ) . '</ul>';
				} elseif ( current_user_can( 'manage_options' ) ) {
					printf(
						'<p class="primary-nav__empty">%s <a href="%s">%s</a></p>',
						esc_html__( 'Pages are not yet published.', 'jiwf-academy' ),
						esc_url( admin_url( '?jiwf_seed=1' ) ),
						esc_html__( 'Run the JIWF starter setup', 'jiwf-academy' )
					);
				}
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
