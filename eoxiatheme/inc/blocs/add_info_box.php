<?php

/* Add box to blocs */
function eox_bloc_info_register_meta_boxes() {
    add_meta_box( 'meta-box-id', __( 'Affichage', 'eoxiatheme' ), 'eox_bloc_info_my_display_callback', 'featured_bloc', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'eox_bloc_info_register_meta_boxes' );
 
/* Meta box display callback */
function eox_bloc_info_my_display_callback( $post ) {
    echo '<p><strong>'.__('Pour afficher ce bloc', 'eoxiatheme').'</strong></p>';
    echo '<p><code>[get_blocs id="'.$post->ID.'"]</code></p>';
}
?>