<?php
/**
 * Archive template.
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
					<?php the_archive_title( '<h1 class="section__title">', '</h1>' ); ?>
					<?php the_archive_description( '<div class="section__description">', '</div>' ); ?>
				</div>

				<?php if ( have_posts() ) : ?>
					<div class="section__body"><div class="card-grid">
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
