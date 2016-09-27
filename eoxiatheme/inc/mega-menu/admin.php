<?php

add_action( 'init', array( 'Eoxia_add_mega_menu_options', 'setup' ) );

class Eoxia_add_mega_menu_options {
	static $options = array(
		'checkbox_tpl' => '
			<p class="additional-menu-field-{name} description description-thin">
				<label for="edit-menu-item-{name}-{id}">
					{label}<br>
					<input
						type="{input_type}"
						id="edit-menu-item-{name}-{id}"
						class="widefat code edit-menu-item-{name}"
						name="menu-item-{name}[{id}]"
						value="{value}">
				</label>
			</p>
		',
		'text_tpl' => '
			<p class="additional-menu-field-{name} description description-thin">
				<label for="edit-menu-item-{name}-{id}">
					{label}<br>
					<input
						type="{input_type}"
						id="edit-menu-item-{name}-{id}"
						class="widefat code edit-menu-item-{name}"
						name="menu-item-{name}[{id}]"
						value="{value}">
				</label>
			</p>
		'
	);
	static function setup() {
		// @todo we can do some merging of provided options from WP options for from config
		self::$options['fields'] = array(
			'mega-menu' => array(
				'name' => 'mega-menu',
				'label' => __('Activer le mega menu', 'eoxiatheme'),
				'container_class' => 'mega-menu',
				'input_type' => 'checkbox',
			),
			'nb_items' => array(
				'name' => 'nb_items',
				'label' => __("Nombre d'items par ligne", 'eoxiatheme'),
				'container_class' => 'nb-item',
				'input_type' => 'number',
				'input_min' => 0,
				'input_max' => 6,
				'input_step' => 1
			),
			'bloc_align' => array(
				'name' => 'bloc_align',
				'label' => __('Alignement', 'eoxiatheme'),
				'container_class' => 'bloc_align',
				'input_type' => 'select',
				'data' => array(
					'left' => 'Gauche',
					'center' => 'Centré',
					'right' => 'Droite',
					'justify' => 'Justifié'
					),
				'default' => __('Alignement', 'eoxiatheme')
			),
			'bloc_column' => array(
				'name' => 'bloc_column',
				'label' => __("Sélectionner un bloc", 'eoxiatheme'),
				'container_class' => 'bloc-colonne',
				'input_type' => 'select',
				'data' => 'featured_bloc',
				'default' => __('Sélectionner un bloc', 'eoxiatheme')
			),
			'mega-menu-mode' => array(
				'name' => 'bloc_mode',
				'label' => __('Sélectionner un mode', 'eoxiatheme'),
				'container_class' => 'bloc_mode',
				'input_type' => 'select',
				'data' => array(
					'std' => 'Standard',
					'background' => 'Background',
					'listleft' => 'Liste gauche',
					'listright' => 'Liste droite'
					),
				'default' => __('Sélectionner un mode', 'eoxiatheme')
			),
			'bloc-background-color' => array(
				'name' => 'bloc_bg_color',
				'label' => __('Couleur de fond', 'eoxiatheme'),
				'container_class' => 'bloc_bg_color',
				'input_type' => 'color',
				'default' => __('Couleur de fond', 'eoxiatheme')
			),
			'bloc-txt-color' => array(
				'name' => 'bloc_txt_color',
				'label' => __('Couleur de texte', 'eoxiatheme'),
				'container_class' => 'bloc_txt_color',
				'input_type' => 'color',
				'default' => __('Couleur de texte', 'eoxiatheme')
			),
			'bloc_opacity' => array(
				'name' => 'bloc_opacity',
				'label' => __("Opacité de l'image", 'eoxiatheme'),
				'container_class' => 'nb-item',
				'input_type' => 'number',
				'input_min' => 0,
				'input_max' => 100,
				'input_step' => 10
			),
		);
		add_filter( 'wp_edit_nav_menu_walker', function () {
			return 'Eoxia_Walker_Nav_Menu_Edit';
		});
		add_filter( 'eoxia_nav_menu_item_additional_fields', array( __CLASS__, '_add_fields' ), 10, 5 );
		add_action( 'save_post', array( __CLASS__, '_save_post' ) );
	}
	static function get_select( $field, $data = 'featured_bloc' ){
		$select = '';
		$data = $field['data'];
		//$select .= $field['value'];
		$select .= '<p class="additional-menu-field-'.$field['name'].' description description-thin">';
		$select .= '<label for="menu-item-'.$field['name'].'['.$field['id'].']"">';
		$select .= $field['label'].'<br>';
		$select .= '<select name="menu-item-'.$field['name'].'['.$field['id'].']"">';
		$select .= '<option value="0">'.$field['default'].'</option>';
		if( is_array( $data ) ){
			foreach ( $data as $key => $value) {
			   $select .= '<option value="'.$key.'" '.selected( $key, $field['value'], false ).'>'.$value.'</option>';
			}
		} else {			
			$eoxiaQuery = new WP_Query( array( 'post_type' => $data, 'posts_per_page' => -1 ) );
			while ( $eoxiaQuery->have_posts() ) : $eoxiaQuery->the_post(); 
				$select .= '<option value="'.get_the_ID().'" '.selected( get_the_ID(), $field['value'], false ).'>'.get_the_title().'</option>';
			endwhile;			
			wp_reset_postdata(); 
		}
		$select .= '</select>';
		$select .= '</label>';
		$select .= '</p>';
		return $select;			
	}
	static function get_input_color( $field ){
		$select = '';
		//$select .= $field['value'];
		$select .= '<p class="additional-menu-field-'.$field['name'].' description description-thin">';
		$select .= '<label name="menu-item-'.$field['name'].'['.$field['id'].']">';
		$select .= $field['label'].'<br>';
		$select .= '<input name="menu-item-'.$field['name'].'['.$field['id'].']" type="text" class="eox-color-field" value="'.$field['value'].'">';
		$select .= '</label>';
		$select .= '</p>';
		return $select;
	}
	static function get_input_number( $field ){
		$select = '';
		//$select .= $field['value'];
		$select .= '<p class="additional-menu-field-'.$field['name'].' description description-thin">';
		$select .= '<label name="menu-item-'.$field['name'].'['.$field['id'].']">';
		$select .= $field['label'].'<br>';
		$select .= '<input min="'.$field['input_min'].'" max="'.$field['input_max'].'" step="'.$field['input_step'].'" class="" name="menu-item-'.$field['name'].'['.$field['id'].']" type="number" value="'.$field['value'].'">';
		$select .= '</label>';
		$select .= '</p>';
		return $select;
	}
	static function get_fields_schema() {
		$schema = array();
		foreach( self::$options['fields'] as $name => $field ) {
			if ( empty($field['name']) ) {
				$field['name'] = $name;
			}
			$schema[] = $field;
		}
		return $schema;
	}
	static function get_menu_item_postmeta_key( $name ) {
		return '_menu_item_' . $name;
	}

	/**
	 * Inject the 
	 * @hook {action} save_post
	 */
	static function _add_fields( $new_fields, $item_output, $item, $depth, $args ) {
		$schema = self::get_fields_schema($item->ID);
		foreach($schema as $key => $field) {
			//print_r( $field );
			if( $depth == 0 ){
				$field['value'] = get_post_meta($item->ID, self::get_menu_item_postmeta_key($field['name']), true);
				$field['id'] = $item->ID;
				//echo $field['name'].' > '.$field['value'].'<hr>';
				if( $field['input_type'] == 'checkbox' ){

					$new_fields .= '
					<p class="additional-menu-field-'.$field['name'].' description">					
							<input
								type="checkbox"
								id="edit-menu-item-'.$field['name'].'-'.$field['id'].'"
								class="widefat code edit-menu-item-'.$field['name'].'"
								name="menu-item-'.$field['name'].'['.$field['id'].']"
								value="'.$field['name'].'" '.checked( $field['name'], $field['value'], false ).'>
								<label for="edit-menu-item-'.$field['name'].'-'.$field['id'].'">
							'.$field['label'].'
						</label>
					</p>';
				} elseif( $field['input_type'] == 'select' ) {
					$new_fields .= self::get_select( $field );
					
				} elseif( $field['input_type'] == 'color' ) {
					$new_fields .= self::get_input_color( $field );
					
				} elseif( $field['input_type'] == 'number' ) {
					$new_fields .= self::get_input_number( $field );
					
				} else {
					$new_fields .= str_replace(
						array_map(function($key){ return '{' . $key . '}'; }, array_keys($field)),
						array_values(array_map('esc_attr', $field)),
						self::$options['text_tpl']
					);
				}
			}
			if( $key == 0 ){
				$new_fields .= '<div class="eoxia-mega-menu-options">';
			}
			
		}
		return '<div class="eoxia-mega-menu">'.$new_fields.'</div></div>';
	}
	/**
	 * Save the newly submitted fields
	 * @hook {action} save_post
	 */
	static function _save_post($post_id) {
		if (get_post_type($post_id) !== 'nav_menu_item') {
			return;
		}
		$fields_schema = self::get_fields_schema($post_id);
		
		foreach($fields_schema as $field_schema) {
			$form_field_name = 'menu-item-' . $field_schema['name'];
			$key = self::get_menu_item_postmeta_key($field_schema['name']);
			//print_r($_POST);
			if (isset($_POST[$form_field_name][$post_id])) {
				
				$value = stripslashes($_POST[$form_field_name][$post_id]);

				update_post_meta($post_id, $key, $value);

			} else {
				update_post_meta($post_id, $key, '');
			}
		}
	}
}

require_once ABSPATH . 'wp-admin/includes/nav-menu.php';

class Eoxia_Walker_Nav_Menu_Edit extends Walker_Nav_Menu_Edit {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$item_output = '';
		parent::start_el($item_output, $item, $depth, $args);
		$new_fields = apply_filters( 'eoxia_nav_menu_item_additional_fields', '', $item_output, $item, $depth, $args );
		// Inject $new_fields before: <div class="menu-item-actions description-wide submitbox">
		if ($new_fields) {
			$item_output = preg_replace('/(?=<div[^>]+class="[^"]*submitbox)/', $new_fields, $item_output);
		}
		$output .= $item_output;
	}
}

?>