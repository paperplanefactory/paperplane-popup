<?php
/*
Plugin Name: Paperplane Popup
Plugin URI: https://www.paperplanefactory.com
description: A plugin to create wonderful popups. You need to activate <strong><a href="https://www.advancedcustomfields.com/pro/">ACF PRO</a> and <a href="https://wordpress.org/plugins/acf-rgba-color-picker/">ACF RGBA Color Picker</a></strong> to make Paperplane Popup work.
Version: 2.9.4
Author: Paperplane
Author URI: https://www.paperplanefactory.com
Copyright: Paperplane
*/

// Exit if accessed directly.
if( ! defined( 'ABSPATH' ) ) exit;

 function paperplanePopup_init() {
	 // verifico che siano attivi ACF e colorpicker
	 if( class_exists( 'ACF' ) && class_exists( 'dhz_acf_plugin_extended_color_picker' ) && class_exists( 'acf_field_post_type_selector_plugin' )  ) {
		 require plugin_dir_path( __FILE__ ) . '/plugin-update-checker/plugin-update-checker.php';
		 $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
		 	'https://plugins.paperplanefactory.com/popup/paperplane-popup-check.json',
		 	__FILE__, //Full path to the main plugin file or functions.php.
		 	'paperplane-popup'
		 );




     add_action( 'save_post', 'paperplanepopup_transient_clear', 10,3 );
     function paperplanepopup_transient_clear( $post_id, $post, $update ) {
       if ( 'paperplane-popup' === $post->post_type ) {
         delete_transient( 'paperplanepopup_transient' );
         return;
       }
     }
		 $today = date('Y-m-d H:i:s');
		 $args_popup_check = array(
	     'post_type' => 'paperplane-popup',
	     'posts_per_page' => -1,
	     'meta_key' => 'data_ora_di_scadenza_pop_up',
	     'meta_query' => array(
	       array(
	         'key' => 'data_ora_di_scadenza_pop_up',
	         'value' => $today,
	         'compare' => '>='
	       )
	     ),
	   );
		 $my_popup_check = get_posts( $args_popup_check );
		 if ( !empty ( $my_popup_check ) ) {
			 $load = 'yes';
		 }
		 else {
			 $load = 'no';
		 }

		 if ( $load === 'yes' ) {
			 add_action( 'wp_enqueue_scripts', 'paperplanepopup_scripts' );
			 add_action( 'wp_enqueue_scripts', 'paperplanepopup_css' );
		 }
		 // Scripts
		 function paperplanepopup_scripts(){
       if (!is_admin()) {
				 $handle_jquerylib = 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js';
			   $list_jquerylib = 'enqueued';
				 if ( wp_script_is( $handle_jquerylib, $list_jquerylib ) ) {
		       return;
		     }
         else {
					 wp_deregister_script('jquery');
					 wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', '', '3.2.1', false);
					 wp_enqueue_script('jquery');
		     }
		  }
			 // Cookies library
			 $handle = 'https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.0/js.cookie.min.js';
		   $list = 'enqueued';
       if (wp_script_is( $handle, $list )) {
         return;
       }
       else {
         wp_register_script( 'js-cookie', 'https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.0/js.cookie.min.js', '', '2.2.0', false);
         wp_enqueue_script( 'js-cookie' );
       }
		 }
		 // Styles
		 function paperplanepopup_css() {
			 wp_enqueue_style( 'paperplanepopup-commnon', plugins_url( '/css/paperplanepopup.min.css', __FILE__ ) );
		 }
		 // Registro il CPT popup
		 require_once(plugin_dir_path( __FILE__ ) . '/inc/register-popup-cpt.php');
		 // aggiungo i ritagli per le immagini
		 require_once(plugin_dir_path( __FILE__ ) . '/inc/register-popup-images.php');
		 // Genero i campi necessari alla compilazione del pop up
		 require_once(plugin_dir_path( __FILE__ ) . '/inc/generate_fields.php');
     // Salvo ACF JSON
     add_filter('acf/settings/save_json', 'paperplanepopup_json_save_point');
     function paperplanepopup_json_save_point( $path ) {
       $path = plugin_dir_path( __FILE__ ) . 'acf-json-popup';
       return $path;
     }
     // Carico ACF JSON
     add_filter('acf/settings/load_json', 'paperplanepopup_json_load_point');
     function paperplanepopup_json_load_point( $paths ) {
       $paths[] = plugin_dir_path( __FILE__ ) . 'acf-json-popup';
       return $paths;
     }


		 // coloro i custom fields
		 add_action('admin_head', 'paperplane_popup_acf_colors');
		 function paperplane_popup_acf_colors() {
			 echo '<style>
			 #acf-group_5afc37d0a76e7 .acf-accordion-title {
				 background-color: #D8D8D8;
			 }
			 </style>';
		 }

		 if ( $load === 'yes' ) {
			 // Inserisco i popup nel front end
			 add_action( 'wp_footer', 'paperplanePopupOnload' );
			 function paperplanePopupOnload() {
				 require_once(plugin_dir_path( __FILE__ ) . '/inc/show-popup.php');
			 }
		 }
	 }
	 // se non sono attivi ACF e colorpicker mostro il messaggio di errore
	 else {
		 add_action( 'admin_notices', 'paperplane_popup_plugin_error_notice' );
	 }
	 function paperplane_popup_plugin_error_notice() {
		 ?>
		 <div class="error">
			 <p>Error: you need to activate <strong><a href="https://www.advancedcustomfields.com/pro/">ACF PRO</a>, <a href="https://wordpress.org/plugins/acf-rgba-color-picker/">ACF RGBA Color Picker</a> and <a href="https://github.com/TimPerry/acf-post-type-selector">Post type selector for Advanced Custom Fields </a></strong> to make Paperplane Popup work.</p>
		 </div>
	 <?php }
 }
 add_action( 'plugins_loaded', 'paperplanePopup_init' );
