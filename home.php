<?php
/**
 * Posts index.
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
					<h1 class="section__title"><?php echo esc_html( get_option( 'page_for_posts' ) ? get_the_title( (int) get_option( 'page_for_posts' ) ) : __( 'Latest posts', 'vaedor-theme' ) ); ?></h1>
				</div>
				<div class="section__body posts">
					<div class="posts__grid">
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/components/post-card' ); ?>
							<?php endwhile; ?>
						<?php else : ?>
							<?php get_template_part( 'template-parts/content/content', 'none' ); ?>
						<?php endif; ?>
					</div>
					<?php vaedor_posts_pagination(); ?>
				</div>
			</div>
		</section>
	</div>
</main>
<?php get_footer(); ?>
