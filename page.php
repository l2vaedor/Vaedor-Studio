<?php
/**
 * Page template.
 *
 * @package Vaedor_Base
 */

$vaedor_has_sidebar = ! is_front_page() && is_active_sidebar( 'sidebar-1' );

get_header();
?>
<main id="main-content" tabindex="-1" class="<?php echo esc_attr( vaedor_get_main_classes( $vaedor_has_sidebar ) ); ?>">
	<div class="content">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'page' );
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
		?>
	</div>

	<?php if ( $vaedor_has_sidebar ) : ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>
</main>
<?php
get_footer();
