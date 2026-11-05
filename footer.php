<?php
/**
 * Site footer.
 *
 * @package Vaedor_Base
 */

$vaedor_description = vaedor_option( 'footer_description' );
$vaedor_phone       = vaedor_option( 'footer_phone' );
$vaedor_email       = vaedor_option( 'footer_email' );
$vaedor_copyright   = vaedor_option( 'footer_copyright' );
if ( '' === $vaedor_copyright ) {
	/* translators: {year} and {site} are replaced with the current year and site name. */
	$vaedor_copyright = __( '© {year} {site}. All rights reserved.', 'vaedor-theme' );
}
?>
	<footer class="footer">
		<div class="shell">
			<div class="footer__main">
				<div class="footer__brand">
					<a class="footer__site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php if ( $vaedor_description ) : ?>
						<p class="footer__description"><?php echo esc_html( $vaedor_description ); ?></p>
					<?php endif; ?>
				</div>

				<?php if ( $vaedor_phone || $vaedor_email ) : ?>
					<address class="footer__contact">
						<?php if ( $vaedor_phone ) : ?>
							<a class="footer__contact-link" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $vaedor_phone ) ); ?>"><?php echo esc_html( $vaedor_phone ); ?></a>
						<?php endif; ?>
						<?php if ( $vaedor_email ) : ?>
							<a class="footer__contact-link" href="mailto:<?php echo esc_attr( antispambot( $vaedor_email ) ); ?>"><?php echo esc_html( antispambot( $vaedor_email ) ); ?></a>
						<?php endif; ?>
					</address>
				<?php endif; ?>

				<?php if ( has_nav_menu( 'footer' ) ) : ?>
					<nav class="navigation navigation--footer" aria-label="<?php esc_attr_e( 'Footer menu', 'vaedor-theme' ); ?>">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'container'      => false,
								'menu_class'     => 'menu menu--footer',
								'fallback_cb'    => false,
								'depth'          => 1,
							)
						);
						?>
					</nav>
				<?php endif; ?>

				<?php if ( has_action( 'vaedor_footer_social' ) ) : ?>
					<div class="footer__social"><?php do_action( 'vaedor_footer_social' ); ?></div>
				<?php endif; ?>
			</div>

			<div class="footer__bottom">
				<p class="footer__copyright"><?php echo esc_html( str_replace( array( '{year}', '{site}' ), array( wp_date( 'Y' ), get_bloginfo( 'name' ) ), $vaedor_copyright ) ); ?></p>
			</div>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
