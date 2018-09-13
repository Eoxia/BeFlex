<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package beflex
 * @since 1.0.0
 * @version 2.0.0-phoenix
 */

?>

	</div><!-- #content -->


		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php if ( is_active_sidebar( 'boxfoot-1' ) || is_active_sidebar( 'boxfoot-2' ) || is_active_sidebar( 'boxfoot-3' ) || is_active_sidebar( 'boxfoot-4' ) ) : ?>
				<div id="boxfoot" class="site-width">
					<div class="gridlayout grid-4">
						<aside class="sidebar">
							<?php if ( is_active_sidebar( 'boxfoot-1' ) ) :
								dynamic_sidebar( 'boxfoot-1' );
							endif; ?>
						</aside>
						<aside class="sidebar">
							<?php if ( is_active_sidebar( 'boxfoot-2' ) ) :
								dynamic_sidebar( 'boxfoot-2' );
							endif; ?>
						</aside>
						<aside class="sidebar">
							<?php if ( is_active_sidebar( 'boxfoot-3' ) ) :
								dynamic_sidebar( 'boxfoot-3' );
							endif; ?>
						</aside>
						<aside class="sidebar">
							<?php if ( is_active_sidebar( 'boxfoot-4' ) ) :
								dynamic_sidebar( 'boxfoot-4' );
							endif; ?>
						</aside>
					</div><!-- .gridwrapper -->
				</div><!-- .site-width -->
			<?php endif; ?>

			<div class="site-width">
				<div class="gridlayout grid-2">
					<div class="site-info">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						<?php echo esc_html( '©' ); ?>
						<?php echo esc_html( date( 'Y' ) ); ?>
					</div><!-- .site-info -->
					<div class="sidebar">
						<aside class="sidebar">
							<?php if ( is_active_sidebar( 'footer-1' ) ) :
								dynamic_sidebar( 'footer-1' );
							endif; ?>
						</aside>
					</div>
				</div><!-- .gridwrapper -->
			</div><!-- .site-width -->

		</footer><!-- #colophon -->

	<div id="burger-menu">
		<div class="navigation-overlay"></div>
		<div class="burger-container">
			<span class="close-burger"><i class="fal fa-times"></i></span>
			<?php
			$user = wp_get_current_user();
			if ( has_nav_menu( 'menu-1' ) ) :
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			elseif ( beflex_allowed( $user->roles, 'editor,administrator' ) ) :
				echo beflex_notification( __( 'Please set your navigation as "Main navigation" to make it appear', 'beflex' ), 'warning', admin_url( 'nav-menus.php' ) ); // WPCS: XSS ok.
			endif;
			?>
		</div><!-- .burger-container -->
	</div><!-- #burger-menu -->

	<?php
	if ( is_wpshop() ) :
		echo do_shortcode( '[wps_mini_cart type="fixed"]' );
	endif;
	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
