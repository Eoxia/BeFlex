<?php

/* get blocs collection function */

function eox_get_sidebar( $atts ){

	$type = 'ib';
	$nb_per_line = 0;

	if( is_array( $atts ) ){

		$type = $atts['type'] ? $atts['type'] : 'grid';
		$nb_per_line = $atts['nb_per_line'] ? $atts['nb_per_line'] : 4;

	}	
	
	// if( have_rows('liens_reseaux', 'options') ):

	// 	echo '<div class="socializer-wrapper '.$type.'wrapper w'.$nb_per_line.'">';
	//     while ( have_rows('liens_reseaux', 'options') ) : the_row();

	// 		//get_template_part( 'inc/social/content', 'social' );

	//     endwhile;

	//     echo '</div>';

	// else :
		
	// 	$edit_link = '<a href="'.home_url().'/wp-admin/admin.php?page=theme-options">'.__('Ajouter', 'eoxiatheme').'</a>';

	// 	eox_get_alert( __('Pas de sidebar', 'eoxiatheme').' : '.$edit_link );

	// endif;
}

function eox_register_sidebars(){
	if( have_rows('sidebars', 'options') ):
	    while ( have_rows('sidebars', 'options') ) : the_row();
	        $sidebar_name = get_sub_field('sidebar', 'options');
	        register_sidebar( array(
				'name'          => $sidebar_name,
				'id'            => sanitize_title( $sidebar_name ),
				'description'   => esc_html( get_sub_field('sidebar_description', 'options') ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>'
			) );
	    endwhile;
    endif;
}

add_action( 'widgets_init', 'eox_register_sidebars' );

add_action( 'add_meta_boxes', 'eox_add_metabox_page' );
function eox_add_metabox_page (){
	add_meta_box( 'eox-sidebar-page', 'Sidebar de la page', 'eox_add_metabox_page_content', 'page', 'side', 'high' );
}
function eox_add_metabox_page_content (){
	global $post;
	$values = get_post_custom( $post->ID );

	//var_dump( $values );

	$afficher_sidebar = array();
	$position_sidebar = array();
	$select_sidebar = array();

	$afficher_sidebar = isset( $values['afficher_sidebar'] ) ?  $values['afficher_sidebar']  : '';
	$position_sidebar = isset( $values['position_sidebar'] ) ?  $values['position_sidebar']  : '';
	$select_sidebar = isset( $values['select_sidebar'] ) ?  $values['select_sidebar']  : '';

	//var_dump($afficher_sidebar);

	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

	//if($afficher_sidebar): ?>
		<p>
			<?php //print_r($afficher_sidebar[0]); ?>
			<input type="checkbox" id="afficher_sidebar" name="afficher_sidebar" <?php is_array($afficher_sidebar) ? checked( $afficher_sidebar[0], true ) : false; ?> />
			<label for="afficher_sidebar">Afficher une sidebar sur cette page</label>
		</p>

		<div id="afficher_sidebar_container">
			<p>
				<label for="position_sidebar">Position de la Sidebar</label><br>
				<select name="position_sidebar" id="position_sidebar" class="widefat">
					<option value="eox-sidebar-droite" <?php is_array( $position_sidebar ) ? selected( $position_sidebar[0], 'eox-sidebar-droite' ) : false ; ?>>Droite</option>
					<option value="eox-sidebar-gauche" <?php is_array( $position_sidebar ) ? selected( $position_sidebar[0], 'eox-sidebar-gauche' ) : false ; ?>>Gauche</option>
				</select>
			</p>

			<p>
				<label for="select_sidebar">Choisir la sidebar</label><br>

				<select name="select_sidebar" id="select_sidebar" class="widefat">
					<?php foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ): ?>
					     <option value="<?php echo ucwords( $sidebar['id'] ); ?>" <?php is_array( $select_sidebar ) ? selected( $select_sidebar[0], ucwords( $sidebar['id'] ) ) : false; ?>>
					              <?php echo ucwords( $sidebar['name'] ); ?>
					     </option>
					<?php endforeach; ?>
				</select>
			</p>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('#afficher_sidebar_container').hide();
				$('#afficher_sidebar').click(function() {
			  		$('#afficher_sidebar_container').toggle(400);
				});
				if ($('#afficher_sidebar:checked').val() !== undefined) {
					$('#afficher_sidebar_container').show();
				}
			});
		</script>
	<?php //endif;
}

add_action( 'save_post', 'eox_add_metabox_page_content_save' );
function eox_add_metabox_page_content_save( $post_id )
{

	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

	$afficher_sidebar = isset( $_POST['afficher_sidebar'] ) && $_POST['afficher_sidebar'] ? true : false;
	update_post_meta( $post_id, 'afficher_sidebar', $afficher_sidebar );

	if( isset( $_POST['position_sidebar'] ) )
	 update_post_meta( $post_id, 'position_sidebar', esc_attr( $_POST['position_sidebar'] ) );

	if( isset( $_POST['select_sidebar'] ) )
	 update_post_meta( $post_id, 'select_sidebar', esc_attr( $_POST['select_sidebar'] ) );

}


?>