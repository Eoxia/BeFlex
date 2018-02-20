<?php
/**
 * ACF Flexible Wysiwyg Template
 *
 * @author Eoxia <contact@eoxia.com>
 * @since 1.0.0
 * @version 2.0.0-phoenix
 * @package beflex
 */

$display_sidebar          = get_sub_field( 'afficher_une_sidebar' );
$sidebar_name             = get_sub_field( 'choisir_une_sidebar' );
$display_type             = get_sub_field( 'affichage' ) ? get_sub_field( 'affichage' ) : 'default';
$section_background       = get_sub_field( 'background' );
$section_background_color = '';
$section_class            = '';
$section_style            = '';

$section_class .= $display_type . ' ';
if ( $section_background ) :
	$section_background_color = get_sub_field( 'couleur_de_fond_de_la_section' );
	$section_text_color       = get_sub_field( 'couleur_du_texte_de_la_section' );
	$section_image_opacity    = get_sub_field( 'opacite_de_limage_section' );
	$section_background_image = get_sub_field( 'image_de_fond_de_la_section' );

	$section_class .= ( $section_image_opacity ) ? '-opacity-' . get_sub_field( 'opacite_de_limage_section' ) : '';
	if ( $section_background_image ) :
		$section_style .= ( $section_background_image ) ? 'background: url(' . $section_background_image['url'] . ') 50% 50%; background-size: cover; ' : '';
	else :
		$section_style .= ( $section_background_color ) ? 'background: ' . $section_background_color . '; ' : '';
	endif;
	$section_style .= ( $section_text_color ) ? 'color: ' . $section_text_color . ';' : '';
endif;
$section_class .= get_sub_field( 'alignement' ) ? '-align-' . get_sub_field( 'alignement' ) : '-align-left';
?>

<div class="flexible-wysiwyg section-content -padding-1 <?php echo esc_html( $section_class ); ?>" style="<?php echo esc_html( $section_style ); ?>">

	<?php if ( $section_background ) : ?>
		<span class="section-opacity" style="background: <?php echo esc_html( $section_background_color ); ?>"></span>
	<?php endif; ?>

	<div class="site-layout site-width">

		<?php if ( $display_sidebar && $sidebar_name ) : ?>
			<aside id="secondary" class="widget-area" role="complementary">
				<?php dynamic_sidebar( $sidebar_name ); ?>
			</aside><!-- #secondary -->
		<?php endif; ?>

		<?php get_template_part( 'template-parts/flexible/template-parts/flexible-wysiwyg-' . $display_type ); ?>

	</div>
</div>
