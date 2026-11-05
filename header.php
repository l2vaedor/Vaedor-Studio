<?php
/**
 * Site header.
 *
 * @package Vaedor_Base
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="container">
	<header class="<?php echo esc_attr( vaedor_base_header_classes() ); ?>">
		<a class="screen-reader-text screen-reader-text--focusable" href="#main-content"><?php esc_html_e( 'Skip to content', 'vaedor-theme' ); ?></a>

		<div class="shell header__shell">
			<div class="header__inner">
				<div class="header__brand">
					<?php if ( has_custom_logo() ) : ?>
						<div class="header__logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php else : ?>
						<a class="header__site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php endif; ?>
				</div>

				<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav id="primary-navigation" class="navigation navigation--primary" aria-label="<?php esc_attr_e( 'Primary menu', 'vaedor-theme' ); ?>" data-js="mobile-menu">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container'      => false,
							'menu_class'     => 'menu menu--primary',
							'fallback_cb'    => false,
							'depth'          => 3,
						)
					);
					?>
				</nav>
				<?php endif; ?>

				<?php $vaedor_header = vaedor_base_get_settings('header'); ?>
				<?php if ( has_action( 'vaedor_header_actions' ) || ($vaedor_header['cta_enabled'] && $vaedor_header['cta_url']) ) : ?>
				<div class="header__actions">
					<?php if ($vaedor_header['cta_enabled'] && $vaedor_header['cta_url']) : ?>
					<a class="button button--primary" href="<?php echo esc_url($vaedor_header['cta_url']); ?>"><?php echo esc_html($vaedor_header['cta_text']); ?></a>
					<?php endif; ?>
					<?php do_action( 'vaedor_header_actions' ); ?>
				</div>
				<?php endif; ?>
				<?php if ( has_nav_menu( 'primary' ) ) : ?>

				<button class="header__menu-toggle" type="button" aria-controls="primary-navigation" aria-expanded="false" data-js="mobile-menu-toggle" hidden>
					<span class="header__menu-icon" aria-hidden="true"></span>
					<span class="header__menu-label"><?php esc_html_e( 'Menu', 'vaedor-theme' ); ?></span>
				</button>
				<?php endif; ?>
			</div>
		</div>
	</header>
