<form method="get" id="searchform" action="<?php echo esc_url( home_url() ); ?>/">
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="<?php _e('Search', 'eoxiatheme'); ?>" />
</form>