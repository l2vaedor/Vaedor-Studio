<?php
/**
 * Search form.
 *
 * @package Vaedor_Base
 */

$vaedor_search_id = wp_unique_id( 'search-field-' );
?>
<form class="form form--search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="field field--search">
		<label class="field__label screen-reader-text" for="<?php echo esc_attr( $vaedor_search_id ); ?>"><?php esc_html_e( 'Search for:', 'vaedor-theme' ); ?></label>

		<div class="field__control">
			<input id="<?php echo esc_attr( $vaedor_search_id ); ?>" class="field__input" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Search…', 'vaedor-theme' ); ?>">
		</div>
	</div>

	<div class="form__actions">
		<button class="button button--primary" type="submit">
			<span class="button__label"><?php esc_html_e( 'Search', 'vaedor-theme' ); ?></span>
		</button>
	</div>
</form>
