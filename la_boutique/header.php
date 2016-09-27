<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eox
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div class="site">

<!-- 	<div class="site-top">		
		<div class="site-width">
			<div>
				<?php eox_get_widget( 'top-1' ); ?>
			</div>
		</div>
	</div>	 -->

	<header class="site-header" role="banner">
		<div class="site-width">
			<div class="flex-layout">	
				<div class="site-branding">
					<?php if( class_exists('acf') ): ?>

						<?php $logo = get_field('logo', 'options') ?>
						<?php if( $logo ): ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt']; ?>">
							</a>
						<?php else: ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
							<p class="site-description"><?php bloginfo('description'); ?></p>
						<?php endif; ?>	

					<?php endif; ?>				
				</div>
				<div class="site-navigation">
					<nav class="main-navigation show-screen" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'walker'  => new Eoxia_Mega_Menu() ) ); ?>
					</nav><!-- #site-navigation -->

				</div>
				<div class="site-tools">
						<a href="#" class="js-search"><i class="wps-icon-search"></i></a>
					<?php if( class_exists('wpshop_products') ): ?>
						<a href="<?php echo get_permalink( wpshop_tools::get_page_id( get_option('wpshop_myaccount_page_id')  ) ); ?>" class="wps-my-account"><i class="wps-icon-user"></i></a>	
						<a href="#" class="wps-action-mini-cart-opener wps-my-cart"><i class="wps-icon-basket"></i><?php echo do_shortcode('[wps-numeration-cart]'); ?></a>	
					<?php endif; ?>
					<a id="js-burger" href="#" class="burger js-burger hide-screen">
						<span class="entry-label">
							<?php _e('Navigation', 'eox' ); ?>
						</span>
						<span class="entry-icon">
							<span class="top-icon"></span>
							<span class="middle-icon"></span>
							<span class="bottom-icon"></span>
						</span>
					</a>
				</div>
			</div>			
		</div>
	</header><!-- #masthead -->
	<div id="search-field">
		<div class="site-width">
			<i class="wps-icon-search"></i>
			<?php get_search_form(); ?>
			<a href="" class="js-search-close"><i class="wps-icon-close"></i></a>
		</div>
	</div>
	<div class="navigation">
		<div class="site-width">
			

		</div>
	</div>

	<div class="main-content">
		<?php if( class_exists('acf') ): ?>
			<?php $diaporamas = get_field('diaporama_page'); ?>
			<?php echo $diaporamas ? do_shortcode('[get_diaporama id="'.$diaporamas[0]->ID.'"]') : false; ?>
		<?php endif; ?>			
		<div class="site-width">
			<?php if ( function_exists('yoast_breadcrumb') && !is_home() && !is_front_page() ) {
			     yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			} ?>
		</div>
