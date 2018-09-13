<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beflex
 * @since 1.0.0
 * @version 2.0.0-phoenix
 */

get_header(); ?>

	<main id="primary" class="content-area" role="main">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</main><!-- #primary -->

	<?php
	if ( is_acf() && get_field( 'display_page_sidebar' ) ) :
		get_sidebar();
	endif;

get_footer();
