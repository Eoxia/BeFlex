<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beflex
 * @since 1.0.0
 * @version 2.0.0-phoenix
 */

if ( is_acf() ) :
	$display_title = ( get_field( 'display_page_title' ) ) ? true : false;
else :
	$display_title = true;
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( $display_title ) : ?>
		<header class="entry-header site-width">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
		if ( is_acf() ) :
			$row = 0;
			if ( have_rows( 'page_content' ) ) :
				while ( have_rows( 'page_content' ) ) : the_row(); ?>

					<div class="flexible-item flexible-item-<?php echo esc_html( $row ); ?>"> <?php
						get_template_part( 'template-parts/flexible/' . get_row_layout() );
						$row++; ?>
					</div> <?php

				endwhile;
			endif;
		else :
			the_content();
		endif;

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'beflex' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'beflex' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
