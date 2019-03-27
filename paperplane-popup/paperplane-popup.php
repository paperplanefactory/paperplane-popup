<?php
/*
Plugin Name: Paperplane Popup
Plugin URI: https://www.paperplanefactory.com
description: A plugin to create wonderful popups. You need to activate <strong><a href="https://www.advancedcustomfields.com/pro/">ACF PRO</a> and <a href="https://wordpress.org/plugins/acf-rgba-color-picker/">ACF RGBA Color Picker</a></strong> to make Paperplane Popup work.
Version: 2.8.2
Author: Paperplane
Author URI: https://www.paperplanefactory.com
Copyright: Paperplane
*/

require plugin_dir_path( __FILE__ ) . '/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://www.paperplanefactory.com/plugins/paperplane-popup-check.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'paperplane-popup'
);

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register our text domain.
 *
 * @since 0.8.0
 *
 * @internal
 */
 function paperplanePopup_init() {
	 // verifico che siano attivi ACF e colorpicker
	 if( class_exists( 'ACF' ) && class_exists( 'dhz_acf_plugin_extended_color_picker' )  ) {
		 // Scripts
		 add_action( 'wp_enqueue_scripts', 'paperplanepopup_scripts' );
		 function paperplanepopup_scripts(){
			 // Cookies library
			 $handle = 'https://cdn.paperplanefactory.com/js/js.cookie.min.js';
		   $list = 'enqueued';
		     if (wp_script_is( $handle, $list )) {
		       return;
		     } else {
					 wp_register_script( 'js-cookie', 'https://cdn.paperplanefactory.com/js/js.cookie.min.js', '', '2.2.0', false);
					 wp_enqueue_script( 'js-cookie' );
		     }
		 }
		 // Styles
		 add_action( 'wp_enqueue_scripts', 'paperplanepopup_css' );
		 function paperplanepopup_css() {
			 wp_enqueue_style( 'paperplanepopup-commnon', plugins_url( '/css/paperplanepopup.min.css', __FILE__ ) );
		 }
		 // Registro il CPT popup
		function paperplanepopup_register_popup() {
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
				"public" => false,
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

			register_post_type( "popup", $args );
		}
		add_action( 'init', 'paperplanepopup_register_popup' );
		// coloro i custom fields
		add_action('admin_head', 'paperplane_popup_acf_colors');
		function paperplane_popup_acf_colors() {
		  echo '<style>
		  .acf-accordion-title {
		    background-color: #D8D8D8;
		  }
		  </style>';
		}

		// aggiungo i ritagli per le immagini
		add_action( 'init', 'paperplanepopup_register_image_size' );
		function paperplanepopup_register_image_size() {
		    add_image_size( 'paperplanepopup_desktop_image', 1920, 9999);
				add_image_size( 'paperplanepopup_desktop_image_vertical', 447, 650, true);
				add_image_size( 'paperplanepopup_mobile_image', 768, 9999);
		}

		// Inserisco i popup nel front end
		add_action( 'wp_footer', 'paperplanePopupOnload' );
		function paperplanePopupOnload() {
			require_once(plugin_dir_path( __FILE__ ) . '/inc/show-popup.php');
		}
		// Genero i campi necessari alla compilazione del pop up
		require_once(plugin_dir_path( __FILE__ ) . '/inc/generate_fields.php');

	}
	// se non sono attivi ACF e colorpicker mostro il messaggio di errore
	else {
		add_action( 'admin_notices', 'my_plugin_error_notice' );
	}
	function my_plugin_error_notice() {
		?>
		<div class="error">
			<p>Error: you need to activate <strong><a href="https://www.advancedcustomfields.com/pro/">ACF PRO</a> and <a href="https://wordpress.org/plugins/acf-rgba-color-picker/">ACF RGBA Color Picker</a></strong> to make Paperplane Popup work.</p>
		</div>
		<?php }
	}
	add_action( 'plugins_loaded', 'paperplanePopup_init' );
