<?php
/**
 * Template part of Flexible Wysiwyg. Grid template.
 *
 * @author Eoxia <contact@eoxia.com>
 * @since 1.0.0
 * @version 2.0.0-phoenix
 * @package beflex
 */

?>
<div class="site-layout content">
	<?php
	if ( have_rows( 'liste_wysiwyg' ) ) :
		while ( have_rows( 'liste_wysiwyg' ) ) : the_row();

			$title = get_sub_field( 'titre_de_la_section' );
			$width = get_sub_field( 'largeur' ) ? get_sub_field( 'largeur' ) : '100'; ?>

			<div class="grid-content" style="width: <?php echo esc_html( $width ); ?>%;">
				<?php if ( ! empty( $title ) ) : ?>
					<header class="entry-header">
						<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
					</header><!-- .entry-header -->
				<?php endif; ?>

				<div class="bloc-container">
					<?php the_sub_field( 'relation_wysiwyg' ); ?>
				</div>
			</div> <?php

		endwhile;
	endif;
	?>
</div>
<?php
