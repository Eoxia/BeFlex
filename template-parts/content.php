<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beflex
 * @since 1.0.0
 * @version 2.0.0-phoenix
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

			$categories = wp_get_post_categories( get_the_ID() );
			if ( 'post' === get_post_type() && ! empty( $categories ) ) : ?>
				<div class="post-categories">
					<?php foreach ( $categories as $cat ) : ?>
						<a class="post-categorie" href="<?php echo esc_url( get_category_link( $cat ) ); ?>"><?php echo esc_html( get_cat_name( $cat ) ); ?></a>
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
			if ( is_acf() ) :
				$trim_size = ( get_field( 'is_post_trim', 'options' ) ) ? get_field( 'post_trim_size', 'options' ) : '100';
			else :
				$trim_size = '100';
			endif;

			if ( is_single() ) :
				the_content( esc_html( 'Read more', 'beflex' ) );
			else :
				echo esc_html( wp_trim_words( get_the_content(), $trim_size, ' (...)' ) );
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
