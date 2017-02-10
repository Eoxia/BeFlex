<?php
/**
 * The sidebar containing the blog part
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eox
 */

?>

<?php if ( is_active_sidebar( 'sidebar-boutique' ) ): ?>
	<div id="sidebar" class="widget-area eox-sidebar-droite" role="complementary">
		<?php dynamic_sidebar( 'sidebar-boutique' ); ?>
	</div><!-- #secondary -->
<?php endif; ?>
