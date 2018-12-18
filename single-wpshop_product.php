<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package beflex
 * @since 1.0.0
 * @version 2.0.0-phoenix
 */

get_header(); ?>

	<main id="primary" class="content-area" role="main">

		<?php
		while ( have_posts() ) : the_post();

			the_content();

		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_sidebar( 'shop' );
get_footer();
