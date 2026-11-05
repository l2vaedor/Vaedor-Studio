<?php
/**
 * Not found template.
 *
 * @package Vaedor_Base
 */

get_header();
?>
<main id="main-content" tabindex="-1" class="main">
	<div class="content">
		<section class="section">
			<div class="shell">
				<div class="section__head">
					<p class="section__eyebrow"><?php esc_html_e( 'Error 404', 'vaedor-theme' ); ?></p>

					<h1 class="section__title"><?php esc_html_e( 'Page not found', 'vaedor-theme' ); ?></h1>

					<p class="section__description"><?php esc_html_e( 'The page may have moved or no longer exists.', 'vaedor-theme' ); ?></p>
				</div>

				<div class="section__body">
					<a class="button button--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<span class="button__label"><?php esc_html_e( 'Return home', 'vaedor-theme' ); ?></span>
					</a>
				</div>
			</div>
		</section>
	</div>
</main>
<?php
get_footer();
