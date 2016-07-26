<?php
/*
Plugin name: WP Serveur Dashboard widget
Description: Le fil d'actualité de WP Serveur sur votre dashboard
 */
add_action('wp_dashboard_setup', 'add_dashboard_widget_wpserveur' );
function add_dashboard_widget_wpserveur() {
	// Add dashboard Widget
	wp_add_dashboard_widget( 'dashboard_widget_wpserveur', __( 'Nouvelles de WP Serveur' ), 'dashboard_widget_function' );

	// Sort
	global $wp_meta_boxes;
 	$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
	$dashboard_widget_wpserveur_backup = array( 'dashboard_widget_wpserveur' => $normal_dashboard['dashboard_widget_wpserveur'] );
 	unset( $normal_dashboard['dashboard_widget_wpserveur'] );
 	$sorted_dashboard = array_merge( $dashboard_widget_wpserveur_backup, $normal_dashboard );
 	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}

function dashboard_widget_function() {
	$feeds = array(
		'news' => array(
			'link'         => 'https://www.wpserveur.net/news/',
			'url'          => 'https://www.wpserveur.net/news/feed/',
			'title'        => 'WP Serveur',
			'items'        => 3,
			'show_summary' => 1,
			'show_author'  => 0,
			'show_date'    => 1,
		)
	);
	wp_dashboard_primary_output( 'dashboard_widget_wpserveur', $feeds );

}