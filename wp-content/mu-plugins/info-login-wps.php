<?php
/*
MU Plugin : Logo login WPServeur
Description: Affiche " Ce site est hébergé par WPServeur :) " sur la page de login WordPress
Version: 1.2.15042016
Author: WP Serveur
Author URI: https://www.www.wpserveur.net
Date: 15/04/2016
*/


/** Ajout d'information hébergement WPserveur */
function login_wps_enqueue_scripts(){
	echo '
		<style type="text/css" media="screen">
			#backtoblog:after {
				display: block;
				content: "Ce site est hébergé par WP Serveur :)";
				text-align: center;
				margin-top: 20px;
				color: #99999B;
				}
		</style>
	';
}
add_action( 'login_enqueue_scripts', 'login_wps_enqueue_scripts' );
