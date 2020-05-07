<?php
function paperplanepopup_register_popup_cpt() {
  $labels = array(
    "name" => __( "Popups", "" ),
    "singular_name" => __( "Popup", "" ),
    "menu_name"          => _x( "Popup", "" ),
    "name_admin_bar"     => _x( "Popup", "" ),
    "add_new"            => _x( "Aggiungi nuovo", "Popup", "" ),
    "add_new_item"       => __( "Aggiungi nuovo Popup", "" ),
    "new_item"           => __( "Nuovo Popup", "" ),
    "edit_item"          => __( "Modifica Popup", "" ),
    "view_item"          => __( "Visualizza Popup", "" ),
    "all_items"          => __( "Tutti i Popup", "" ),
    "search_items"       => __( "Cerca Popup", "" ),
    "parent_item_colon"  => __( "Popup genitore:", "" ),
    "not_found"          => __( "Nessun Popup trovato.", "" ),
    "not_found_in_trash" => __( "Nessun Popup trovato nel cestino.", "" )
  );

  $args = array(
    "label" => __( "Paperplane Popups", "" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => false,
    "show_ui" => true,
    "show_in_rest" => false,
    "rest_base" => "",
    "has_archive" => false,
    'menu_icon'   => 'dashicons-layout',
    "show_in_menu" => true,
    "exclude_from_search" => true,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => array( "slug" => "popup", "with_front" => true ),
    "query_var" => true,
    "supports" => array( "title" ),
  );

  register_post_type( "paperplane-popup", $args );
}
add_action( 'init', 'paperplanepopup_register_popup_cpt' );
