<div class="bloc-item">
	<div class="bloc-item-padder">
		<?php if( get_the_post_thumbnail() ): ?>
			<div class="bloc-item-thumbnail">
				<?php the_post_thumbnail('thumb-bloc'); ?>
			</div>
		<?php endif; ?>
		<div class="bloc-item-content">
			<?php eox_the_html( get_the_title(), 'h3', 'bloc-title' ); ?>
			<?php eox_the_html( get_the_excerpt(), 'p', 'bloc-content' ); ?>
			<?php eox_the_html_link( __('Lire la suite', 'eoxiatheme'), get_permalink(), 'button button-1'  ); ?>
		</div>
	</div>
</div>