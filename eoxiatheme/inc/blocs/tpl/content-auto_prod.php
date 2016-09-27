
<?php $relation_posts = get_field( 'choix_de_donnee_prod' ); ?>

<?php $ids = array(); ?>
<?php if( is_array( $relation_posts ) ): ?>
	<?php foreach ($relation_posts as $key => $relation_post): ?>
		<?php $ids[] = $relation_post; ?>
	<?php endforeach; ?>
<?php else: ?>
	<?php $edit_link = '<a href="'.home_url().'/wp-admin/post.php?post='.$post->ID.'&action=edit">'.__('Editer le bloc', 'eoxiatheme').'</a>'; ?>
	<?php eox_get_alert( __('Ce bloc est vide', 'eoxiatheme').' : '.$edit_link ); ?>
<?php endif; ?>
<?php $ids = implode(',' , $ids); ?>
<?php //echo '[wpshop_products pid="'.$ids.'" sorting="no" grid_element_nb_per_line="'.$atts['limit'].'"]'; ?>
<?php $product_markup =  do_shortcode('[wpshop_products pid="'.$ids.'" sorting="no" grid_element_nb_per_line="'.$atts['limit'].'"]'); ?>

<?php $product_markup = eox_rewrite_wps_product_tpl( $product_markup, $atts ); ?>
<?php echo $product_markup; ?>