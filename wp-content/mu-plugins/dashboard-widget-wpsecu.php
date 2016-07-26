<?php
/*
Plugin name: WP Sécurité Dashboard widget
Description: Le fil d'actualité de la sécurité de WordPress sur votre dashboard
 */
add_action('wp_dashboard_setup', 'add_dashboard_widget_wpsecu' );
function add_dashboard_widget_wpsecu() {
	// Add dashboard Widget
	wp_add_dashboard_widget( 'dashboard_widget_wpsecu', __( 'Sécurité de WordPress' ), 'dashboard_widget_function_secu' );

	// Sort
	global $wp_meta_boxes;
 	$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
	$dashboard_widget_wpsecu_backup = array( 'dashboard_widget_wpsecu' => $normal_dashboard['dashboard_widget_wpsecu'] );
 	unset( $normal_dashboard['dashboard_widget_wpsecu'] );
 	$sorted_dashboard = array_merge( $dashboard_widget_wpsecu_backup, $normal_dashboard );
 	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}

function dashboard_widget_function_secu() {
	$feeds = array(
		'news' => array(
			'link'         => 'https://www.wpserveur.net/securite-wps/',
			'url'          => 'https://www.wpserveur.net/securite-wps/feed/',
			'title'        => 'Securite WordPress',
			'items'        => 3,
			'show_summary' => 1,
			'show_author'  => 0,
			'show_date'    => 1,
		)
	);
	wp_dashboard_primary_output( 'dashboard_widget_wpsecu', $feeds );

}
