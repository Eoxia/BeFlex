<?php
/**
 * Gutenberg customization
 *
 * @author Eoxia <contact@eoxia.com>
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 1.0.0
 * @version 2.0.0-phoenix
 * @package beflex
 */

$primary = get_theme_mod( 'beflex_primary_color', '#0e6eff' );

if ( is_beflex_settings() ) :
	$font_family    = \beflex_pro\Settings_Helper::g()->get_font_family();
	$font_weight    = \beflex_pro\Settings_Helper::g()->get_font_weight();
	$font_transform = \beflex_pro\Settings_Helper::g()->get_font_transform();
endif;
?>

<style>
	.edit-post-layout__content h1,
	.edit-post-layout__content h2,
	.edit-post-layout__content h3,
	.edit-post-layout__content h4,
	.edit-post-layout__content h5,
	.edit-post-layout__content h6,
	.beflex-diaporama .diaporama-title,
	.widget-title,
	.editor-post-title__block .editor-post-title__input {
		<?php if ( ! empty( $font_family ) ) : ?>
			font-family: '<?php echo esc_html( $font_family ); ?>';
		<?php endif; ?>
		<?php if ( ! empty( $font_weight ) ) : ?>
			font-weight: <?php echo esc_html( $font_weight ); ?>;
		<?php endif; ?>
		<?php if ( ! empty( $font_style ) ) : ?>
			font-style: <?php echo esc_html( $font_style ); ?>;
		<?php endif; ?>
		<?php if ( ! empty( $font_transform ) ) : ?>
			text-transform: <?php echo esc_html( $font_transform ); ?>;
		<?php endif; ?>
	}

	<?php if ( ! empty( $primary ) ) : ?>
		.edit-post-layout__content .button.button-primary:not(.bordered) {
			background: <?php echo esc_html( $primary ); ?>;
			border-color: <?php echo esc_html( $primary ); ?>;
		}
		.edit-post-layout__content .button.bordered.button-primary {
			border-color: <?php echo esc_html( $primary ); ?>;
			color: <?php echo esc_html( $primary ); ?>;
		}
		.edit-post-layout__content .button.bordered.button-primary:hover {
			box-shadow: inset 0 -2.6em <?php echo esc_html( $primary ); ?>;
		}
		.edit-post-layout__content .owl-carousel .owl-dots .owl-dot.active span {
			border: 2px solid <?php echo esc_html( $primary ); ?>;
			box-shadow: 0px 0px 0px 2px <?php echo esc_html( $primary ); ?>;
		}
		.edit-post-layout__content .flexible-gallery .gallery .content:after {
			background: <?php echo esc_html( $primary ); ?>;
		}
	<?php endif; ?>

</style>
