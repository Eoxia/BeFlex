<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package beflex
 * @since 1.0.0
 * @version 2.0.0-phoenix
 */

get_header(); ?>

	<main id="primary" class="content-area error-404 not-found" role="main">

		<header class="primary-header">
			<h1 class="page-title"><?php esc_html_e( 'Oops, that page can\'t be found', 'beflex' ); ?></h1>
		</header><!-- .primary-header -->

		<div class="primary-content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Perhaps searching can help ? ', 'beflex' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .primary-content -->

	</main><!-- #primary -->

<?php
get_footer();
