<?php

include 'redux-framework/redux-framework.php';

// remove demo link
function removeDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
    }
}
add_action('init', 'removeDemoModeLink');

// rtl css file for redux
add_action( 'admin_init', 'shahba_redux_rtl' );
function shahba_redux_rtl() {
    if(is_rtl()){
        wp_register_style( 'myPluginStylesheet', TEMPLATE_URL.'includes/redux/redux-rtl.css' );
        wp_enqueue_style( 'myPluginStylesheet' );
    }
}