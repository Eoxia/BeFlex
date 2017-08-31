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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="link-home">
						<img src="<?php echo esc_html( get_template_directory_uri() ); ?>/img/404-default.jpg" class="error-image" />
					</a>
					<h1 class="page-title"><?php esc_html_e( 'Oups ! Cette page n\'a pas été trouvée', 'beflex' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'Essayez la recherche ci-dessous', 'beflex' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
