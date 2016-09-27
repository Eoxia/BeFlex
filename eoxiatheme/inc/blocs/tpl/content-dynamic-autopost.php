
<?php $order = get_field("dynamique_choix"); ?>

<?php $args = array( 'post_type' => 'post', 'posts_per_page'=> get_field('derniers_articles') ); ?>
<?php //echo $order; ?>

<?php if( $order == 'date' ): ?>

<?php elseif( $order == 'category' ): ?>
	<?php $args['cat'] = get_field('par_categorie'); ?>
<?php elseif( $order == 'tag' ): ?>
	<?php $args['tag__in'] = get_field('par_tag'); ?>
<?php elseif( $order == 'format' ): ?>
	<?php $formats = get_field('par_format'); ?>
	<?php $formats_array = array(); ?>
	<?php foreach ($formats as $key => $format) {
		array_push($formats_array,$format->slug);
	} ?>
	<?php //var_dump( $formats_array ); ?>
	<?php $args['tax_query'] = array(
     array(
       'taxonomy' => 'post_format',
       'field' => 'slug',
       'terms' => $formats_array
     )); ?>	
<?php endif; ?>
<?php //print_r( $args ); ?>
<?php //var_dump( $args ); ?>

<?php $eox_get_dynamic_bloc = new WP_Query( $args ); ?>
<?php if ( $eox_get_dynamic_bloc->have_posts() ) : ?>
<?php while ( $eox_get_dynamic_bloc->have_posts() ) : $eox_get_dynamic_bloc->the_post(); ?>
	<?php $img = get_the_ID() ? get_post_thumbnail_id( get_the_ID() ) : false; ?>

	<?php $img_class =  sprintf( 'class="%1$s"' ,'bloc-item-thumbnail '.( $img ? '' : '-no-image' )); ?>

	<?php $bg_img_style = (($atts['mode'] == '-m-background') && $atts['displayimg'] ) ? sprintf('style="background-image:url(%1$s);"', wp_get_attachment_url( get_post_thumbnail_id(  get_the_ID() ) ) ) : false; ?>
		<div class="<?php echo $atts['bloc_class']; ?> -dynamic-post">
			<div class="bloc-item-padder" <?php echo $bg_img_style; ?>>
				<figure <?php echo $img_class; ?> style="<?php echo $atts['bg_style']; ?>">
					<?php //echo ( $img && $atts['displayimg'] && ( $atts['mode'] != '-m-background' )); ?>
					<?php eox_the_html_img( $img, 1 ); ?>
					<?php //eox_the_html_img( $img, ( $img && $atts['displayimg'] && ( $atts['mode'] != '-m-background' ) ) ); ?>
				</figure>
				<div class="bloc-item-content" style="<?php echo $atts['txt_style']; ?>">
					<?php echo eox_the_post_categories( get_the_ID() ); ?>
					<div class="post-meta">
						<?php eox_posted_on(); ?>
					</div><!-- .post-meta -->
					
					<?php eox_the_html( eox_get( get_the_title(), $atts['content_title'], $atts['displaytitle'] ) , 'h3', 'bloc-title', $atts['txt_style'] ); ?>					
					<?php eox_the_html( eox_get( wp_trim_words(get_field('extrait_de_la_page', get_the_ID() ), $atts['excerptlength'] ), $atts['content_excerpt'], $atts['displayexcerpt'] ), 'p' ); ?>
					<?php eox_the_html_link( __('Lire la suite', 'eoxiatheme'), get_permalink( get_the_ID() ) , 'button button-1', $atts['bloc_button_style']  ); ?>
				</div>
			</div>
		</div>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php else: ?>
<?php endif; ?>