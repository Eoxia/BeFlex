<?php $img = wp_get_attachment_image_src($atts['content_img'], 'thumb-bloc'); ?>

<?php $img_class =  sprintf( '%1$s' ,'bloc-item-thumbnail '.( $img && $atts['displayimg'] ? '' : '--no-image' )); ?>

<?php $bg_img_style = (($atts['mode'] == '--m-background') && $atts['displayimg'] ) ? sprintf('background-image:url(%1$s);', $img[0] ) : false; ?>

<div class="<?php echo $atts['bloc_class']; ?>">
	<div class="bloc-item-padder" style="<?php echo $bg_img_style ?>">
		<figure class="<?php echo $img_class; ?>" style="<?php echo $atts['bg_style']; ?>">
			<?php eox_the_html_img( $atts['content_img'], ( $atts['content_img'] && $atts['displayimg'] && ( $atts['mode'] != '--m-background' )) ); ?>
		</figure>
		<div class="bloc-item-content" style="<?php echo $atts['txt_style']; ?>">
			<?php eox_the_html( eox_get( get_sub_field('titre'), $atts['content_title'], $atts['displaytitle'] ), 'h3', 'bloc-title', $atts['txt_style'] ); ?>
			<?php eox_the_html( eox_get( wp_trim_words( get_sub_field('extrait'), $atts['excerptlength'] ), $atts['content_excerpt'], $atts['displayexcerpt'] ), 'p', 'bloc-content' ); ?>
			<?php eox_the_html_link($atts['content_label'], $atts['content_link'], 'button button-1', $atts['bloc_button_style']  ); ?>
		</div>
	</div>
</div>