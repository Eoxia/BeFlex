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

<?php if ( $display_title ) : ?>
	<header class="primary-header site-width">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	</header><!-- .primary-header -->
<?php endif; ?>

<div class="primary-content">
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
	endif;

	// Affiche le contenu standard de l'éditeur de WordPress s'il existe.
	$basic_content = get_the_content();
	if ( ! empty( $basic_content ) ) : ?>
		<div class="site-width">
			<?php the_content(); ?>
		</div> <?php
	endif;

	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'beflex' ),
		'after'  => '</div>',
	) );
	?>
</div><!-- .primary-content -->

<?php if ( get_edit_post_link() ) : ?>
	<footer class="primary-footer site-width">
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
	</footer><!-- .primary-footer -->
<?php endif; ?>
