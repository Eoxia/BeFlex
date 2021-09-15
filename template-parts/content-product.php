<?php
/**
 * Template part for displaying page content in single-wps-product.php
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
?>


<div class="gridlayout grid-2">
	<?php if ( get_the_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<div class="primary-content">
		<header class="primary-header site-width">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</header><!-- .primary-header -->

		<?php
		the_content();
		?>
	</div><!-- .primary-content -->
</div>

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
