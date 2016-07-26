<?php
/*
Plugin Name:  Remove Query Strings
Description: Retire les chaînes de requête de ressources statiques pour améliorer les performances cache
Version: 1.0
Author: WP Serveur
Author URI: https://www.wpserveur.net
Date: 01/10/2015
*/

function wps_remove_query_strings_1( $src ){	
	$rqs = explode( '?ver', $src );
        return $rqs[0];
}
		if ( is_admin() ) {
// Remove query strings from static resources disabled in admin
}
		else {
add_filter( 'script_loader_src', 'wps_remove_query_strings_1', 15, 1 );
add_filter( 'style_loader_src', 'wps_remove_query_strings_1', 15, 1 );
}

function wps_remove_query_strings_2( $src ){
	$rqs = explode( '&ver', $src );
        return $rqs[0];
}
		if ( is_admin() ) {
// Remove query strings from static resources disabled in admin
}
		else {
add_filter( 'script_loader_src', 'wps_remove_query_strings_2', 15, 1 );
add_filter( 'style_loader_src', 'wps_remove_query_strings_2', 15, 1 );
}
?>