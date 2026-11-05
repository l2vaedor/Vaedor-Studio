<?php
/**
 * Search results template.
 *
 * @package Vaedor_Base
 */

get_header();
?>
<main id="main-content" tabindex="-1" class="main">
	<div class="content">
		<section class="<?php echo esc_attr( vaedor_base_section_classes( 'posts' ) ); ?>">
			<div class="shell">
				<div class="section__head">
					<h1 class="section__title">
						<?php
						printf(
							/* translators: %s: search query. */
							esc_html__( 'Search results for: %s', 'vaedor-theme' ),
							esc_html( get_search_query() )
						);
						?>
					</h1>
				</div>

				<?php if ( have_posts() ) : ?>
					<div class="section__body posts"><div class="posts__grid">
						<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/components/post-card' );
						endwhile;
						?>
					</div></div>

					<?php vaedor_posts_pagination(); ?>
				<?php else : ?>
					<div class="section__body">
						<?php get_template_part( 'template-parts/content/content', 'none' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	</div>
</main>
<?php
get_footer();
