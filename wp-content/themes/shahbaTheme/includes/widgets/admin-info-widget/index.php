<?php
/**
 * Add a widget to the dashboard.
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function shahbaTheme_dashboard_widget_get_data(){

    $data = wp_remote_post(
        'http://shahbasoft.com/update_center/shahbaTheme/shahbatheme_admin_block.php',
        array(
            'method' => 'POST',
            'sslverify' => false,
            'timeout'   => 45,
            'body' => array('lang'=>get_locale())
            )
        );

    if(! is_wp_error($data) ){
        return json_decode($data['body']);
    }
    return false;
}

$shahbaTheme_dashboard_widget_data = shahbaTheme_dashboard_widget_get_data();

function shahbaTheme_dashboard_widget() {
    global $shahbaTheme_dashboard_widget_data;
    if($shahbaTheme_dashboard_widget_data)
    wp_add_dashboard_widget(
                 'shahbaTheme_dashboard_widget',         // Widget slug.
                 $shahbaTheme_dashboard_widget_data->title,         // Title.
                 'shahbaTheme_dashboard_widget_function' // Display function.
    );
}
add_action( 'wp_dashboard_setup', 'shahbaTheme_dashboard_widget' );
/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function shahbaTheme_dashboard_widget_function() {
    global $shahbaTheme_dashboard_widget_data;
    echo $shahbaTheme_dashboard_widget_data->content;
}