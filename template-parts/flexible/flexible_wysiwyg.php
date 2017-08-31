<?php
/**
 * ACF Flexible Wysiwyg Template
 *
 * @author Eoxia <contact@eoxia.com>
 * @since 1.0.0
 * @version 2.0.0-phoenix
 * @package beflex
 */

$display_sidebar = get_sub_field( 'afficher_une_sidebar' );
$sidebar_name = get_sub_field( 'choisir_une_sidebar' );
$display_type = get_sub_field( 'affichage' ) ? get_sub_field( 'affichage' ) : 'default';
?>
<div class="flexible-wysiwyg section-content -padding-1">
	<div class="site-layout site-width">

		<?php if ( $display_sidebar && $sidebar_name ) : ?>
			<aside id="secondary" class="widget-area" role="complementary">
				<?php dynamic_sidebar( $sidebar_name ); ?>
			</aside><!-- #secondary -->
		<?php endif; ?>

		<?php get_template_part( 'template-parts/flexible/template-parts/flexible-wysiwyg-' . $display_type ); ?>

	</div>
</div>
