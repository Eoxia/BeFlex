<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eox
 */

?>
	</div><!-- #content -->

	
	<?php get_template_part( 'template-parts/content', 'boxfoot' ); ?>


	<footer class="site-footer" role="contentinfo">
		<div class="site-width">
			<div class="gridwrapper w2">
				<div class="bloc-item -w-1x2">
					<?php bloginfo('name'); ?> © <?php the_date('Y');?>
				</div>
				<div class="bloc-item -w-1x2">
					<?php eox_get_widget( 'footer-2' ); ?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<div class="touch-overlay"></div>
<nav class="touch-navigation" role="navigation">
	<div class="touch-navigation-content">
		<a href="#" class="js-close-navigation"><i class="icon-times"></i></a>
		<?php if ( has_nav_menu( 'primary' ) ): ?>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		<?php endif; ?>
		
		<div class="site-tools">
			<?php if( class_exists('wpshop_products') ): ?>
				<a href="<?php echo get_permalink( wpshop_tools::get_page_id( get_option('wpshop_myaccount_page_id')  ) ); ?>"><i class="wps-icon-user"></i></a>	
				<a href="<?php echo get_permalink( wpshop_tools::get_page_id( get_option('wpshop_cart_page_id')  ) ); ?>" class=""><i class="wps-icon-basket"></i><?php echo do_shortcode('[wps-numeration-cart]'); ?></a>	
			<?php endif; ?>
		</div>
		<?php echo do_shortcode('[socializer]'); ?>
	</div>
</nav><!-- #site-navigation -->

<?php //echo do_shortcode('[get_blocs id="445"]'); ?>

<?php //echo do_shortcode('[get_blocs id="127" mode="background" bgcolor="#d93939" txtcolor="#fafafa"]'); ?>
<?php //echo do_shortcode('[get_blocs id="127" mode="background" bgcolor="#d93939" txtcolor="#fafafa" displaybutton="true"]'); ?>
<?php //echo do_shortcode('[get_blocs id="127" mode="background" bgcolor="#d93939" txtcolor="#fafafa"]'); ?>

<?php //echo do_shortcode('[get_blocs id="127" mode="background" bgcolor="#d93939" txtcolor="#fafafa"]'); ?>

<?php //echo do_shortcode('[get_blocs id="127" mode="background"]'); ?>

<?php //echo do_shortcode('[get_blocs id="127"]'); ?>
<?php //echo do_shortcode('[get_blocs id="127" displaybutton="true"]'); ?>
<?php //echo do_shortcode('[get_blocs id="127" mode="background" bgcolor="#ff0000" txtcolor="blue" nb_per_line="2" displaybutton="0" imgopacity="0.5" ]'); ?>
<?php //echo '[get_blocs limit="5" dynamique="last_products" mode="background" align="left" itemperline="2" bgcolor="#268ED9" imgopacity=30]'; ?>
<?php //echo do_shortcode('[get_blocs id="976" align="left" itemperline="4" bgcolor="#268ED9" imgopacity=30]'); ?>

<?php //echo do_shortcode('[get_blocs id="870" align="left" mode="background" itemperline="4" bgcolor="#268ED9" imgopacity=30]'); ?>

<?php if( class_exists('wpshop_products') ): ?>
	<?php echo do_shortcode( '[wps_mini_cart type="fixed"]' ); ?>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
