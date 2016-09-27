<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package eox
 */

get_header(); ?>

<div class="site-width">
	<div class="site-layout">
		<div id="sidebar" class="widget-area eox-sidebar-droite" role="complementary">
			<?php dynamic_sidebar( 'sidebar-blog' ); ?>
		</div><!-- #secondary -->

		<div id="content" class="content-area">
			<main id="main" class="site-main" role="main"> 

			<?php while ( have_posts() ) : the_post(); ?>

				<?php echo do_shortcode('[get_blocs id="'.get_the_ID().'"]'); ?>

			<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
</div>

<?php get_footer(); ?>
