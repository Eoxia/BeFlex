<?php $custom_cats = get_field( 'choix_de_donnee_catprod' ); ?>

<?php if( is_array( $custom_cats ) ): ?>

	<?php foreach ($custom_cats as $key => $custom_cat): ?>

	<?php $cat_wpshop = get_term( $custom_cats[$key], 'wpshop_product_category' ); ?>

	<?php $img =  wpshop_categories::get_the_category_thumbnail( $cat_wpshop->term_id, 'thumb-bloc'); ?>

	<?php $img_class =  sprintf( 'class="%1$s"' ,'bloc-item-thumbnail '.( $img && $atts['displayimg'] ? '' : '--no-image' )); ?>

	<?php $bg_img_style = (($atts['mode'] == '-m-background') && $atts['displayimg'] ) ? sprintf('style="background-image:url(%1$s);"',$img[0]) : false; ?>

		<div class="<?php echo $atts['bloc_class']; ?> -product-cat">
			<div class="bloc-item-padder" <?php echo $bg_img_style; ?>>
				<div <?php echo $img_class; ?> style="<?php echo $atts['bg_style']; ?>">
					<?php if( $img && $atts['displayimg'] && ( $atts['mode'] != '-m-background' )): ?>
						<?php echo '<img src="'.$img[0].'" alt="'.$cat_wpshop->name.'">'; ?>
					<?php endif; ?>					
					
				</div>
				<div class="bloc-item-content" style="<?php echo $atts['txt_style']; ?>"> 					
					<?php eox_the_html( eox_get( $cat_wpshop->name, $atts['content_title'], $atts['displaytitle'] ) , 'h3', 'bloc-title', $atts['txt_style'] ); ?>
					<?php eox_the_html( eox_get( wp_trim_words($cat_wpshop->description, $atts['excerptlength'] ), $atts['content_title'], $atts['displaytitle'] ), 'p', 'bloc-content' ); ?>
					<?php eox_the_html_link( __('Lire la suite', 'eoxiatheme'), get_term_link( $cat_wpshop->term_id ) , 'button button-1', $atts['bloc_button_style']  ); ?>
				</div>
			</div>
		</div>

	<?php endforeach; ?>
<?php else: ?>
	<?php $edit_link = '<a href="'.home_url().'/wp-admin/post.php?post='.$post->ID.'&action=edit">'.__('Editer le bloc', 'eoxiatheme').'</a>' ?>
	<?php eox_get_alert( __('Ce bloc est vide', 'eoxiatheme').' : '.$edit_link ); ?>
<?php endif; ?>
