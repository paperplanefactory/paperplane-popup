
<?php
    wp_reset_query();
    $current_cpt = get_post_type( get_the_ID() );
    if ( is_front_page() ) {
      $where_am_i = 'home';
    }
    if ( is_home() ) {
      $where_am_i = 'home';
    }
    $current_position = get_the_ID();
    $today = date('Y-m-d H:i:s');
    $args_popup = array(
      'post_type' => 'popup',
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
    $query_popup = new WP_Query( $args_popup );
    if ( $query_popup->have_posts() ) : while( $query_popup->have_posts() ) : $query_popup->the_post();
    $where_to_show = get_field( 'dove_mostrare_pop_up');
    if ( $where_to_show === 'onepage' ) {
      $show_in_page = get_field( 'scegli_pagina', false, false );
    }
    if ( $where_to_show === 'onectp' ) {
      $choosen_cpt = get_field( 'scegli_cpt' );
    }
    $test_mode = get_field( 'test_mode' );
     ?>
     <?php
     if ( $test_mode == 1 ) {
       if ( is_user_logged_in() ) {
         if ( $where_to_show === 'onepage' && $show_in_page == $current_position )  {
           require_once( plugin_dir_path( __FILE__ ) . '/content-popup.php');
         }
         elseif ( $where_to_show === 'homepage' && $where_am_i === 'home' ) {
           require_once( plugin_dir_path( __FILE__ ) . '/content-popup.php');
         }
         elseif ( $where_to_show === 'onectp' && $current_cpt === $choosen_cpt ) {
           require_once( plugin_dir_path( __FILE__ ) . '/content-popup.php');
         }
         elseif ( $where_to_show === 'everywhere' ) {
           require_once( plugin_dir_path( __FILE__ ) . '/content-popup.php');
         }
       }
     }
     else {
       if ( $where_to_show === 'onepage' && $show_in_page == $current_position )  {
         require_once( plugin_dir_path( __FILE__ ) . '/content-popup.php');
       }
       elseif ( $where_to_show === 'homepage' && $where_am_i === 'home' ) {
         require_once( plugin_dir_path( __FILE__ ) . '/content-popup.php');
       }
       elseif ( $where_to_show === 'onectp' && $current_cpt === $choosen_cpt ) {
         require_once( plugin_dir_path( __FILE__ ) . '/content-popup.php');
       }
       elseif ( $where_to_show === 'everywhere' ) {
         require_once( plugin_dir_path( __FILE__ ) . '/content-popup.php');
       }
     }

     ?>
  <?php endwhile; endif; wp_reset_query(); ?>
