<?php
$current_position = get_the_ID();
wp_reset_query();
if ( is_front_page() ) {
	$where_am_i = 'home';
	$current_position = 'nope';
}
if ( is_home() ) {
	$where_am_i = 'home';
	$current_position = 'nope';
}
if ( is_archive() ) {
	$current_position = 'nope';
}

$today = date( 'Y-m-d H:i:s' );

if ( function_exists( 'PLL' ) ) {
	$args_popup = array(
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
	$query_popup = new WP_Query( $args_popup );
} else {
	$query_popup = get_transient( 'paperplanepopup_transient' );
	if ( empty( $query_popup ) ) {
		$args_popup = array(
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
		$query_popup = new WP_Query( $args_popup );
		set_transient( 'paperplanepopup_transient', $query_popup, MONTH_IN_SECONDS );
	}
}





if ( $query_popup->have_posts() ) :
	while ( $query_popup->have_posts() ) :
		$query_popup->the_post();
		$post_slug = get_the_ID();
		$cookie_name = 'close-forever' . $post_slug;
		$cookidookie = $_COOKIE[ $cookie_name ];
		$where_to_show = get_field( 'dove_mostrare_pop_up' );
		if ( $where_to_show === 'onepage' ) {
			$show_in_page = get_field( 'scegli_pagina' );
			$show_in_page = array_flip( $show_in_page );
		}
		if ( $where_to_show === 'onectp' ) {
			$choosen_cpt = get_field( 'scegli_cpt' );
		}
		$test_mode = get_field( 'test_mode' );
		$final_url = get_field( 'scegli_url' );
		global $wp;
		$current_url = home_url( $wp->request );
		$AddToEnd = "/";
		$current_url .= $AddToEnd;
		if ( $cookidookie != 'yes' ) {
			if ( $final_url != $current_url ) {
				if ( $test_mode == 1 ) {
					if ( is_user_logged_in() ) {
						if ( $where_to_show === 'onepage' && isset( $show_in_page[ $current_position ] ) ) {
							include ( plugin_dir_path( __FILE__ ) . '/content-popup.php' );
						} elseif ( $where_to_show === 'homepage' && $where_am_i === 'home' ) {
							include ( plugin_dir_path( __FILE__ ) . '/content-popup.php' );
						} elseif ( $where_to_show === 'onectp' && is_singular( $choosen_cpt ) ) {
							include ( plugin_dir_path( __FILE__ ) . '/content-popup.php' );
						} elseif ( $where_to_show === 'everywhere' ) {
							include ( plugin_dir_path( __FILE__ ) . '/content-popup.php' );
						}
					}
				} else {
					if ( $where_to_show === 'onepage' && isset( $show_in_page[ $current_position ] ) ) {
						include ( plugin_dir_path( __FILE__ ) . '/content-popup.php' );
					} elseif ( $where_to_show === 'homepage' && $where_am_i === 'home' ) {
						include ( plugin_dir_path( __FILE__ ) . '/content-popup.php' );
					} elseif ( $where_to_show === 'onectp' && is_singular( $choosen_cpt ) ) {
						include ( plugin_dir_path( __FILE__ ) . '/content-popup.php' );
					} elseif ( $where_to_show === 'everywhere' ) {
						include ( plugin_dir_path( __FILE__ ) . '/content-popup.php' );
					}
				}
			}
		}

	endwhile;
endif;
wp_reset_query();
