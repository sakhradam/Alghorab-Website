<?php
/*
MU Plugin : Disallow emoji
Description: Désactive les emoji de WordPress
Version: 1.2
Author: WP Serveur
Author URI: https://www.wpserveur.net
Date: 13/04/2016
*/


/* Remove emoji */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');