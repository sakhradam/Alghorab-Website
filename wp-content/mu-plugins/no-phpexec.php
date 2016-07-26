<?php
/*
Plugin Name: Disallow PHP execution from "PHP Execution" plugins like
Description: Désactive l'éxécution PHP dans les plugins like.
Author: Julio Potier
*/
// php execution
add_filter( 'php_execution_allowed', '__return_false' );
// wp exec php
function execute_php_wps($atts,$content = '') { // roflol i'm a cleaner
	return preg_replace('/\<\?(?:php|=).*?\?\>/si', '', $content);
}
// php code for posts
add_shortcode( 'php', 'execute_php_wps' );
// shortcode exec php
add_filter( 'pre_option_scep_author_cap', '__return_false' );
if( isset( $_REQUEST['c_scep_param_nonce'] ) )
	unset( $_REQUEST['c_scep_param_nonce'] );