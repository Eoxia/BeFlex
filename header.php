<?php
/**
 * The header of theme Beflex
 *
 * @author Eoxia <contact@eoxia.com>
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since 1.0.0
 * @version 2.0.0
 * @package beflex
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'beflex' ); ?></a>

	<header id="masthead" class="site-header sticky" role="banner">
		<div class="site-branding">
			<?php
			if ( is_acf() ) :
				$site_logo = get_field( 'logo', 'options' );
			endif;
			if ( ! empty( $site_logo ) ) : ?>
				<p class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo esc_html( $site_logo['url'] ); ?>" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>" />
					</a>
				</p> <?php
			else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p> <?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description ) : ?>
					<p class="site-description"><?php echo esc_html( $description ); ?></p>
				<?php
				endif;
			endif;
			?>
		</div><!-- .site-branding -->

		<div class="site-navigation">
			<nav id="main-navigation" role="navigation">
				<?php
				$user = wp_get_current_user();
				if ( has_nav_menu( 'menu-1' ) ) :
					if ( class_exists( '\beflex_pro\Beflex_Mega_Menu' ) ) :
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'walker'  => new \beflex_pro\Beflex_Mega_Menu(),
						) );
					else :
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class' => 'simple-navigation',
						) );
					endif;
				elseif ( beflex_allowed( $user->roles, 'editor,administrator' ) ) :
					echo beflex_notification( __( 'Veuillez définir un menu en "Navigation principale" pour qu\'il apparaisse ici', 'beflex' ), 'warning', admin_url( 'nav-menus.php' ) ); // WPCS: XSS ok.
				endif;
				?>
			</nav><!-- #main-navigation -->
			<a href="#" class="menu-toggle"><i class="fa fa-bars"></i><span><?php esc_html_e( 'Navigation', 'beflex' ); ?></span></a>
		</div><!-- .site-navigation -->

		<div class="site-tool">
			<a href="#" class="js-search"><i class="fa fa-search"></i></a>
			<?php if ( is_wpshop() ) : ?>
				<a href="<?php echo get_permalink( wpshop_tools::get_page_id( get_option( 'wpshop_myaccount_page_id' ) ) ); /* WPCS: xss ok. */ ?>" class="wps-my-account"><i class="wps-icon-user"></i></a>
				<a href="#" class="wps-action-mini-cart-opener wps-my-cart"><i class="wps-icon-basket"></i><?php echo do_shortcode( '[wps-numeration-cart]' ); ?></a>
			<?php endif; ?>
		</div><!-- .site-tool -->
	</header><!-- #masthead -->

	<div id="search-area">
		<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label>
				<i class="fa fa-search"></i>
				<input type="search" class="search-field"
						placeholder="<?php echo esc_attr_x( 'Enter a Keyword', 'placeholder', 'beflex' ) ?>"
						value="<?php echo get_search_query() ?>" name="s"
						title="<?php echo esc_attr_x( 'Search for:', 'label', 'beflex' ) ?>" />
			</label>
		</form>
		<div class="search-overlay"></div>
	</div><!-- #search-field -->

	<?php
	if ( is_page() && is_acf() ) :
		$site_width = ( get_field( 'display_page_sidebar', $post->ID ) ) ? 'site-width' : '';
	else :
		$site_width = 'site-width';
	endif;
	?>
	<div id="content" class="site-content <?php echo esc_html( $site_width ); ?>">
