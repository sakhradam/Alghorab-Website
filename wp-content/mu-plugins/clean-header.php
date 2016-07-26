<?php

/*
Plugin Name: Clean Header
Description: Retire toutes les informations inutiles dans le header
Version: 1.0
Author: Jonathan Buttigieg
Author URI: http://www.jbuttigieg.net
License: GPLv3
*/

defined( 'ABSPATH' ) or	die( 'Cheatin\' uh?' );

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head',10,0 );
remove_action( 'wp_head', 'noindex', 1 );
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'wp_generator');
add_filter( 'wpseo_next_rel_link' , '__return_false' );

// It disables the file js l10n
add_action( 'wp_enqueue_scripts', 'wps_deregister_script_l10n' );
function wps_deregister_script_l10n() {
	wp_deregister_script('l10n');
}