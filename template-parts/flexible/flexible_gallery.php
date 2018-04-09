<?php
/**
 * ACF Flexible Bloc template
 *
 * @author Eoxia <contact@eoxia.com>
 * @since 1.0.0
 * @version 2.0.0-phoenix
 * @package beflex
 */

$display_sidebar          = get_sub_field( 'afficher_une_sidebar' );
$sidebar_name             = get_sub_field( 'choisir_une_sidebar' );
$display_type             = get_sub_field( 'mode_daffichage' ) ? get_sub_field( 'mode_daffichage' ) : 'default';
$section_background       = get_sub_field( 'background' );
$section_background_color = get_sub_field( 'couleur_de_fond_de_la_section' );
$section_class            = beflex_section_class( get_the_ID() );
$section_style            = beflex_section_style( get_the_ID() );
?>

<div class="flexible-gallery section-content <?php echo esc_html( $section_class ); ?>" style="<?php echo esc_html( $section_style ); ?>">

	<?php if ( $section_background ) : ?>
		<span class="section-opacity" style="background: <?php echo esc_html( $section_background_color ); ?>"></span>
	<?php endif; ?>

	<div class="site-layout site-width">

		<?php if ( $display_sidebar && $sidebar_name ) : ?>
			<aside id="secondary" class="widget-area" role="complementary">
				<?php dynamic_sidebar( $sidebar_name ); ?>
			</aside><!-- #secondary -->
		<?php endif; ?>

		<div class="content">
			<?php $section_title = get_sub_field( 'titre_de_la_section' ); ?>
			<?php if ( ! empty( $section_title ) ) : ?>
				<header class="entry-header">
					<h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
				</header><!-- .entry-header -->
			<?php endif; ?>

			<?php get_template_part( 'template-parts/flexible/template-parts/flexible-gallery-' . $display_type ); ?>
		</div>

	</div><!-- .site-layout -->
</div>
