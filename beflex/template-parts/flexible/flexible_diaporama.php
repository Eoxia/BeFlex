<div class="flexible-diaporama">
<?php $posts = get_sub_field('relation_diaporama'); ?>

<?php if( $posts ): ?>

    <?php foreach( $posts as $post): ?>

        <?php echo do_shortcode('[get_diaporama id="'.$post->ID.'"]'); ?>
       
    <?php endforeach; ?>
   
    <?php wp_reset_postdata(); ?>
    
<?php endif; ?>
</div>