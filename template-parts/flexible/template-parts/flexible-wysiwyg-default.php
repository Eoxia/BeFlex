<?php
/**
 * Template part of Flexible Wysiwyg. Simple Template
 *
 * @author Eoxia <contact@eoxia.com>
 * @since 1.0.0
 * @version 2.0.0-phoenix
 * @package beflex
 */

$title = get_sub_field( 'titre_de_la_section' );
?>
<div class="content">
	<?php if ( ! empty( $title ) ) : ?>
		<header class="entry-header">
			<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="bloc-container">
		<?php the_sub_field( 'relation_wysiwyg' ); ?>
	</div>
</div>
