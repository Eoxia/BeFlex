<?php
/**
 * Template part for displaying posts
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( get_the_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<div class="post-content">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			$beflex_categories = wp_get_post_categories( get_the_ID() );
			if ( 'post' === get_post_type() && ! empty( $beflex_categories ) ) : ?>
				<div class="post-categories">
					<?php foreach ( $beflex_categories as $beflex_cat ) : ?>
						<a class="post-categorie" href="<?php echo esc_url( get_category_link( $beflex_cat ) ); ?>"><?php echo esc_html( get_cat_name( $beflex_cat ) ); ?></a>
					<?php endforeach; ?>
				</div> <?php
			endif;

			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php beflex_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			if ( is_single() ) :
				the_content( esc_html( 'Read more', 'beflex' ) );
			else :
				echo esc_html( wp_trim_words( get_the_content(), 30, ' (...)' ) );
			endif;

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'beflex' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer site-width">
			<?php beflex_edit_link(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .content -->
</article><!-- #post-<?php the_ID(); ?> -->
