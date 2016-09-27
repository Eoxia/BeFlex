<?php

/* Register Diaporamas */

$diaporamas_labels = array(
	"name" => "Diaporamas",
	"singular_name" => "Diaporama",
	"menu_name" => "Diaporamas",
	"all_items" => "Tous les Diaporamas",
	"add_new" => "Ajouter",
	"add_new_item" => "Ajouter un diaporama",
	"edit" => "Modifier",
	"edit_item" => "Modifier un diaporama",
	"new_item" => "Nouveau diaporama",
	"view" => "Voir",
	"view_item" => "Voir le diaporama",
	"search_items" => "Chercher un diaporama",
	"not_found" => "Pas de diaporamas",
	"not_found_in_trash" => "Pas de diaporamas dans la corbeille",
	);

$diaporamas_args = array(
	"labels" => $diaporamas_labels,
	"description" => "Diaporama",
	"public" => true,
	"show_ui" => true,
	"show_in_rest" => true,
	"has_archive" => false,
	"show_in_menu" => true,
	"exclude_from_search" => true,
	"capability_type" => "page",
	"map_meta_cap" => true,
	"hierarchical" => false,
	"rewrite" => array( "slug" => "diaporama", "with_front" => false ),
	"query_var" => true,
	"menu_icon" => "dashicons-slides",		
	"supports" => array( "title", "page-attributes" ),				
);
register_post_type( "diaporama", $diaporamas_args );

?>