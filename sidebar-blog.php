<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package beflex
 * @since 1.0.0
 * @version 2.0.0-phoenix
 */

if ( ! is_active_sidebar( 'sidebar-blog' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-blog' ); ?>
</aside><!-- #secondary -->
