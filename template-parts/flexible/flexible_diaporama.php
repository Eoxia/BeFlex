<?php
/**
 * ACF Flexible Diaporama Template
 *
 * @author Eoxia <contact@eoxia.com>
 * @since 1.0.0
 * @version 2.0.0-phoenix
 * @package beflex
 */

$title = get_sub_field( 'titre_de_la_section' );
$content = get_sub_field( 'relation_wysiwyg' );
$full_size = get_sub_field( 'full_screen' );
$diaporamas = get_sub_field( 'relation_diaporama' );
?>
<div class="flexible-diaporama section-content">
	<div class="site-layout <?php echo ( $full_size ) ? '' : 'site-width'; ?>">

		<div class="content">
			<?php
			if ( $diaporamas ) :
				foreach ( $diaporamas as $diaporama ) :
					echo do_shortcode( '[beflex_diaporama id="' . $diaporama->ID . '"]' );
				endforeach;
			endif;
			?>
		</div>

	</div>

	<?php if ( get_edit_post_link( $diaporama->ID ) ) : ?>
		<footer class="entry-footer flexible site-width">
			<?php edit_post_link( esc_html__( 'Edit Diaporama', 'beflex' ), '', '', $diaporama->ID ); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</div>
