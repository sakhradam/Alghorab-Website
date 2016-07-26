<?php
/*
Plugin Name: 	Menu admin bar wps
Description: 	MU Plugin pour afficher un menu avec des liens utiles WPserveur
Version: 		1.2.01032016
Author: 		Benoît de WP Serveur
Author URI: 	https://www.wpserveur.net
Date: 			01/03/2016
*/
/** Pour le menu wpserveur */
function menu_wps_admin_bar_render() {
 global $wp_admin_bar;
	if ( current_user_can( 'manage_options' ) ) {
	$linkwps = '#';
	$wp_admin_bar->add_menu( array(
		'parent' => false,
		'id' => 'link-wps',
		'title' => __('WPServeur'),
		'href' => $linkwps
	));

	$linkwps2 = 'https://www.wpserveur.net/support-wp-serveur/';
	$wp_admin_bar->add_menu(array(
		'parent' => 'link-wps',
		'id' => 'link-wps2',
		'title' => __('Support WPS'),
		'href' => $linkwps2, 'meta' => array( 'target' => '_blank' )
	));
 
	$linkwps3 = 'https://www.wpserveur.net/mode-emploi-wps/';
	$wp_admin_bar->add_menu(array(
		'parent' => 'link-wps',
		'id' => 'link-wps3',
		'title' => __('Mode d\'emploi'),
		'href' => $linkwps3, 'meta' => array( 'target' => '_blank' )
	));
	
	$linkwps4 = 'https://www.wpserveur.net/mon-compte/';
	$wp_admin_bar->add_menu(array(
		'parent' => 'link-wps',
		'id' => 'link-wps4',
		'title' => __('Compte | Console WPS'),
		'href' => $linkwps4, 'meta' => array( 'target' => '_blank' )
	));
	
	}
}
add_action( 'wp_before_admin_bar_render', 'menu_wps_admin_bar_render' );