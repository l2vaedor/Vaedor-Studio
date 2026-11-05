<?php
/**
 * Site footer.
 *
 * @package Vaedor_Base
 */
?>
	<footer class="<?php echo esc_attr( vaedor_base_footer_classes() ); ?>">
		<div class="shell footer__shell">
			<div class="footer__main">
				<div class="footer__brand">
					<a class="footer__site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php $vaedor_footer=vaedor_base_get_settings('footer'); if($vaedor_footer['description']) : ?>
					<p class="footer__description"><?php echo esc_html($vaedor_footer['description']); ?></p>
					<?php endif; ?>
				</div>

				<?php if ( has_nav_menu( 'footer' ) ) : ?>
					<nav class="footer__navigation navigation navigation--footer" aria-label="<?php esc_attr_e( 'Footer menu', 'vaedor-theme' ); ?>">
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
				<div class="footer__social">
					<?php do_action( 'vaedor_footer_social' ); ?>
				</div>
				<?php endif; ?>
			</div>

			<?php if ( $vaedor_footer['copyright'] ) : ?>
			<div class="footer__bottom">
				<p class="footer__copyright">
					<?php
					echo esc_html(str_replace(array('{year}','{site}'),array(wp_date('Y'),get_bloginfo('name')),$vaedor_footer['copyright']));
					?>
				</p>
			</div>
			<?php endif; ?>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
