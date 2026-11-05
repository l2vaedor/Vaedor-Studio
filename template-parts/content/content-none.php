<?php
/**
 * Empty result.
 *
 * @package Vaedor_Base
 */
?>
<div class="entry">
	<h2 class="entry__title"><?php esc_html_e( 'Nothing found', 'vaedor-theme' ); ?></h2>
	<p><?php esc_html_e( 'Try another search or return to the home page.', 'vaedor-theme' ); ?></p>
	<?php get_search_form(); ?>
</div>
