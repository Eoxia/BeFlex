<?php

/* Add box to blocs */
function eox_diaporama_register_meta_boxes() {
    add_meta_box( 'meta-box-id', __( 'Affichage', 'eoxiatheme' ), 'eox_diaporama_display', 'diaporama', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'eox_diaporama_register_meta_boxes' );
 
/* Meta box display callback */
function eox_diaporama_display( $post ) {
    echo '<p><strong>Pour afficher ce diaporama</strong></p>';
    echo '<p><code>[get_diaporama id="'.$post->ID.'"]</code></p>';
}
?>