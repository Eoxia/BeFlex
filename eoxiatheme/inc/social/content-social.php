<div class="social-item">
	<?php $social_item = get_sub_field('reseau_social'); ?>	
	<a href="<?php the_sub_field('lien_social'); ?>" title="<?php the_sub_field('reseau_social'); ?>" target="_blank">
		<i class="icon-<?php echo sanitize_title( $social_item ); ?>"></i>
	</a>
</div>