<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eox
 */

?>

<?php $eox_sidebar_metas = get_post_meta( get_the_id() ); ?>

<?php $afficher_sidebar = isset( $eox_sidebar_metas['afficher_sidebar'] ) ? $eox_sidebar_metas['afficher_sidebar']  : ''; ?>

<?php $position_sidebar = isset( $eox_sidebar_metas['position_sidebar'] ) ? $eox_sidebar_metas['position_sidebar']  : ''; ?>

<?php $select_sidebar = isset( $eox_sidebar_metas['select_sidebar'] ) ? $eox_sidebar_metas['select_sidebar']  : ''; ?>

<?php $select_sidebar = $select_sidebar ? sanitize_title( $select_sidebar[0] ) : false; ?>

<?php if ( is_page() && is_array( $afficher_sidebar ) && $afficher_sidebar[0] && is_active_sidebar( $select_sidebar ) ): ?>

	<div id="sidebar" class="widget-area <?php echo $position_sidebar[0] ? $position_sidebar[0] : false; ?>" role="complementary">
		<?php eox_get_widget( $select_sidebar ); ?>
	</div><!-- #secondary -->

<?php elseif( (is_category( 'wpshop-category' ) && is_active_sidebar( 'sidebar-blog' )) || (is_archive() && is_active_sidebar( 'sidebar-blog' )) || (is_single() && is_active_sidebar( 'sidebar-blog' )) ):?>

	<div id="sidebar" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-blog' ); ?>
	</div><!-- #secondary -->

<?php endif; ?>
