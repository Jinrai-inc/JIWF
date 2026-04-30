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

		<div class="site-brand">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a class="site-brand__text" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					JIWF Academy
					<span class="site-brand__sub">One Wisdom · One World</span>
				</a>
			<?php endif; ?>
		</div>

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
				$nav_items = array(
					array( 'page' => 'about',     'label' => '私たちについて' ),
					array( 'cpt'  => 'program',   'label' => 'プログラム' ),
					array( 'page' => 'campus',    'label' => '拠点' ),
					array( 'page' => 'community', 'label' => 'コミュニティ' ),
					array( 'cpt'  => 'event',     'label' => 'イベント' ),
					array( 'page' => 'contact',   'label' => 'お問い合わせ' ),
				);
				$rendered = array();
				foreach ( $nav_items as $item ) {
					if ( ! empty( $item['page'] ) ) {
						$page = get_page_by_path( $item['page'], OBJECT, 'page' );
						if ( ! $page || $page->post_status !== 'publish' ) continue;
						$rendered[] = sprintf( '<li><a href="%s">%s</a></li>', esc_url( get_permalink( $page ) ), esc_html( $item['label'] ) );
					} elseif ( ! empty( $item['cpt'] ) ) {
						$url = get_post_type_archive_link( $item['cpt'] );
						if ( ! $url ) continue;
						$rendered[] = sprintf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $item['label'] ) );
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
