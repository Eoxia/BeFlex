<?php
/**
 * Template part for displaying page content in page.php
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://codex.wordpress.org/Template_Hierarchy
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
	the_content();

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
