<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package eox
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_post_thumbnail('thumb-blog'); ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="post-meta">
			<?php eox_posted_on(); ?>
		</div><!-- .post-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eoxiatheme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php eox_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
