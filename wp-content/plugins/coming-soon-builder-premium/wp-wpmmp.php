<?php
/**
Plugin Name: Coming Soon Builder Premium
Plugin URI: http://rocketplugins.com/wordpress-coming-soon-plugin/
Description: Adds a responsive coming soon page to your site.
Author: umarbajwa
Author URI: http://rocketplugins.com/wordpress-coming-soon-plugin/
Version: 1.0
**/

require plugin_dir_path( __FILE__ ) . 'config.php';

require WPMMP_PLUGIN_INCLUDE_DIRECTORY . 'functions.php';

define( 'WPMMP_PRO_VERSION_ENABLED', true );

load_wpmmp();