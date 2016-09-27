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
			<main id="main" class="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php the_post_navigation(); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

				<?php eox_post_footer( get_the_id(), 'full' ); ?>

			<?php endwhile; // End of the loop. ?>
			<?php //print_r( get_post_format() ); ?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
</div>

<?php get_footer(); ?>
