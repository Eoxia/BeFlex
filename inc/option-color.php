<?php
/**
 * Theme customization Colors
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

	h1, h2, h3, h4, h5, h6, .beflex-diaporama .diaporama-title, .widget-title {
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
		.button.button-primary:not(.bordered), button, input[type="button"], input[type="reset"], input[type="submit"] {
			background: <?php echo esc_html( $primary ); ?>;
			border-color: <?php echo esc_html( $primary ); ?>;
		}
		.button.bordered.button-primary {
			border-color: <?php echo esc_html( $primary ); ?>;
			color: <?php echo esc_html( $primary ); ?>;
		}
		.button.bordered.button-primary:hover {
			box-shadow: inset 0 -2.6em <?php echo esc_html( $primary ); ?>;
		}
		#comments .comment-list .comment-reply-link {
			border-color: <?php echo esc_html( $primary ); ?>;
			color: <?php echo esc_html( $primary ); ?>;
		}
		#comments .comment-list .comment-reply-link:hover {
			box-shadow: inset 0 -2.6em <?php echo esc_html( $primary ); ?>;
		}
		#comments .comment-list .comment-metadata .comment-edit-link {
			color: <?php echo esc_html( $primary ); ?>;
		}
		blockquote, q {
			border-left: 4px solid <?php echo esc_html( $primary ); ?>;
		}
		#search-area .search-overlay {
			background: <?php echo esc_html( $primary ); ?>;
		}
		a, a:visited {
			color: <?php echo esc_html( $primary ); ?>;
		}
		a:hover, a:focus, a:active {
			color: <?php echo esc_html( beflex_change_color( $primary, -30 ) ); ?>;
		}
		.post-navigation .nav-links .fa {
			background: <?php echo esc_html( $primary ); ?>;
		}
		::-moz-selection {
			background: <?php echo esc_html( $primary ); ?>;
		}
		::selection {
			background: <?php echo esc_html( $primary ); ?>;
		}
		#main-navigation .beflex-mega-menu .beflex-mega-menu-container {
			border-top: 4px solid <?php echo esc_html( $primary ); ?>;
		}

		#main-navigation .menu > .menu-item.current_page_item > a,
		#main-navigation .menu > .menu-item.current-menu-item > a,
		#main-navigation .menu > .menu-item.current_page_ancestor > a,
		#main-navigation .menu > .menu-item.current-menu-ancestor > a {
			color: <?php echo esc_html( $primary ); ?>;
		}

		.site-navigation .menu-toggle .fa {
			color: <?php echo esc_html( $primary ); ?>;
		}
		.owl-carousel .owl-dots .owl-dot.active span {
			border: 2px solid <?php echo esc_html( $primary ); ?>;
			box-shadow: 0px 0px 0px 2px <?php echo esc_html( $primary ); ?>;
		}
		#burger-menu .navigation-overlay {
			background: <?php echo esc_html( $primary ); ?>;
		}
		#masthead .site-tool > a.wps-action-mini-cart-opener .wps-numeration-cart {
			background: <?php echo esc_html( $primary ); ?>;
		}
		.flexible-gallery .gallery .content:after {
			background: <?php echo esc_html( $primary ); ?>;
		}
	<?php endif; ?>

</style>
