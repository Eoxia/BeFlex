<?php
/**
 * The sidebar containing the blog part
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eox
 */

?>

<?php if ( is_active_sidebar( 'sidebar-blog' ) ): ?>
	<div id="sidebar" class="widget-area eox-sidebar-droite" role="complementary">
		<?php dynamic_sidebar( 'sidebar-blog' ); ?>
	</div><!-- #secondary -->
<?php endif; ?>
