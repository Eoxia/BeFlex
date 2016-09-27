<?php $relation_posts = get_field( 'choix_de_donnee_post' ); ?>

<?php if( is_array( $relation_posts ) ): ?>
	<?php foreach ($relation_posts as $key => $relation_post): ?>
		
		<?php $img = $relation_post ? get_post_thumbnail_id( $relation_post->ID ) : false; ?>

		<?php $img_class =  sprintf( 'class="%1$s"' ,'bloc-item-thumbnail '.( $img ? '' : '-no-image' )); ?>

		<?php $bg_img_style = (($atts['mode'] == '-m-background') && $atts['displayimg'] ) ? sprintf('style="background-image:url(%1$s);"', wp_get_attachment_url( get_post_thumbnail_id(  $relation_post->ID ) ) ) : false; ?>

		<div class="<?php echo $atts['bloc_class']; ?> -static-p -type-<?php echo get_post_type($relation_post->ID); ?>">
			<div class="bloc-item-padder" <?php echo $bg_img_style; ?>>
				<figure <?php echo $img_class; ?> style="<?php echo $atts['bg_style']; ?>">
					<?php eox_the_html_img( $img, ( $img && $atts['displayimg'] && ( $atts['mode'] != '-m-background' ) ) ); ?>
				</figure>
				<div class="bloc-item-content" style="<?php echo $atts['txt_style']; ?>">
					<?php echo eox_the_post_categories($relation_post->ID); ?>
					<?php if( $relation_post->post_type == "post" && $atts['displaymetas']): ?>
						<div class="post-meta">
							<?php eox_posted_on(); ?>
						</div><!-- .post-meta -->
					<?php endif; ?>
					
					<?php eox_the_html( eox_get( $relation_post->post_title, $atts['content_title'], $atts['displaytitle'] ) , 'h3', 'bloc-title', $atts['txt_style'] ); ?>					
					<?php eox_the_html( eox_get( wp_trim_words(get_field('extrait_de_la_page', $relation_post->ID ), $atts['excerptlength'] ), $atts['content_excerpt'], $atts['displayexcerpt'] ), 'p', '','' ); ?>
					<?php eox_the_html_link( __('Lire la suite', 'eoxiatheme'), get_permalink( $relation_post->ID ) , 'button button-1', $atts['bloc_button_style']  ); ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<?php else: ?>
	<?php $edit_link = '<a href="'.home_url().'/wp-admin/post.php?post='.$post->ID.'&action=edit">'.__('Editer le bloc', 'eoxiatheme').'</a>'; ?>
	<?php eox_get_alert( __('Ce bloc est vide', 'eoxiatheme').' : '.$edit_link ); ?>
<?php endif; ?>