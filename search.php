<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package beflex
 * @since 1.0.0
 * @version 2.0.0-phoenix
 */

get_header(); ?>

	<main id="primary" class="content-area" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="primary-header">
				<h1 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'beflex' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
			</header><!-- .primary-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			beflex_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	</main><!-- #primary -->

<?php
get_sidebar( 'blog' );
get_footer();
