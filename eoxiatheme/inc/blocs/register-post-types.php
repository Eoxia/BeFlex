<?php

/* Register Blocs */

$blocs_labels = array(
	"name" => "Blocs",
	"singular_name" => "Bloc",
	"menu_name" => "Blocs",
	"all_items" => "Tous les blocs",
	"add_new" => "Ajouter",
	"add_new_item" => "Ajouter un bloc",
	"edit" => "Modifier",
	"edit_item" => "Modifier un bloc",
	"new_item" => "Nouveau bloc",
	"view" => "Voir",
	"view_item" => "Voir le bloc",
	"search_items" => "Chercher un bloc",
	"not_found" => "Pas de blocs",
	"not_found_in_trash" => "Pas de blocs dans la corbeille",
	);

$blocs_args = array(
	"labels" => $blocs_labels,
	"description" => "Bloc de mise en avant",
	"public" => true,
	"show_ui" => true,
	"show_in_rest" => true,
	"has_archive" => false,
	"show_in_menu" => true,
	"exclude_from_search" => true,
	"capability_type" => "page",
	"map_meta_cap" => true,
	"hierarchical" => false,
	"rewrite" => array( "slug" => "featured_bloc", "with_front" => false ),
	"query_var" => true,
	"menu_icon" => "dashicons-star-filled",		
	"supports" => array( "title", "page-attributes" ),				
);

register_post_type( "featured_bloc", $blocs_args );

?>