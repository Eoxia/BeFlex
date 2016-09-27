<?php if( have_rows('bloc_manuel', get_the_id() ) ): ?>

    <?php while ( have_rows('bloc_manuel') ) : the_row(); ?>

    	<?php $img = get_sub_field('image'); ?>

    	<?php $img_class =  sprintf( 'class="%1$s"' ,'bloc-item-thumbnail '.( $img && $atts['displayimg'] ? '' : '--no-image' )); ?>

    	<?php $bg_img_style = (($atts['mode'] == '-m-background') && $atts['displayimg'] ) ? sprintf('style="background-image:url(%1$s);"',$img['sizes']['thumb-bloc']) : false; ?>

        <div class="<?php echo $atts['bloc_class']; ?> -manuel">
			<div class="bloc-item-padder" <?php echo $bg_img_style; ?>>
				<figure <?php echo $img_class; ?> style="<?php echo $atts['bg_style']; ?>">
					<?php eox_the_html_img( $img['ID'], ( $img && $atts['displayimg'] && ( $atts['mode'] != '-m-background' )) ); ?>
				</figure>
				<div class="bloc-item-content" style="<?php echo $atts['txt_style']; ?>">
					<?php eox_the_html( eox_get( get_sub_field('titre'), $atts['content_title'], $atts['displaytitle'] ), 'h3', 'bloc-title', $atts['txt_style'] ); ?>
					<?php eox_the_html( eox_get( wp_trim_words( get_sub_field('extrait'), $atts['excerptlength'] ), $atts['content_excerpt'], $atts['displayexcerpt'] ), 'p', 'bloc-content' ); ?>
					<?php eox_the_html_link( get_sub_field('label_du_lien'), get_sub_field('lien'), 'button button-1', $atts['bloc_button_style']  ); ?>
				</div>
			</div>
		</div>

    <?php endwhile; ?>

<?php else : ?>

		<?php $edit_link = '<a href="'.home_url().'/wp-admin/edit.php?post_type=featured_bloc">'.__('Ajouter', 'eoxiatheme').'</a>'; ?>

		<?php eox_get_alert( __('Pas de bloc', 'eoxiatheme').' : '.$edit_link ); ?>

<?php endif; ?>
