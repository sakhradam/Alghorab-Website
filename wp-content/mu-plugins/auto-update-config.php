<?php
/*
Plugin name: Auto Updates Config
Description: Configuration des mises à jour automatiques.
 */

defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

/*add_action( 'admin_init', 'jetest' );
function jetest() {
     wp_maybe_auto_update();
}*/


if( is_admin() ) {

    /**
    //Admin Settings
    */
    add_action( 'admin_menu', 'autoupdates_create_menu' );
    function autoupdates_create_menu() {
        if ( current_user_can( 'manage_options' ) ) {
            register_setting( 'autoupdates', 'autoupdates_core' );
            register_setting( 'autoupdates', 'no_autoupdates_plugins' ); // On coche ceux à ne pas mettre à jour !!
            register_setting( 'autoupdates', 'autoupdates_plugins_notification' );
            add_options_page( 'Auto Updates '. __( 'Settings' ), 'Auto Updates', 'manage_options', 'autoupdates', 'autoupdates_settings_page' );
        }
    }

    function autoupdates_setting_callback_function( $args ) {
        extract( $args );
        $value_old = get_option( $name ); 
        echo '<select name="' . $name . '" id="' . $name . '">';
        foreach( $options as $key => $option )
            echo '<option value="' . $key . '" ' . selected( ( $value_old == $key ) || ( $value_old === false ), true, false ) . '>' . esc_html( $option ) . '</option>';
        echo '</select>';
    }

    function autoupdates_plugins_settings_callback_function( $args ) {
    	extract( $args );
        $value_old = (array)get_option( $name );
    	$plugins = get_plugins();
    	foreach( $plugins as $k => $plugin ) {
            echo '<input type="hidden" name="' . $name . '[' . $k . ']" value="1">';
    		echo '<p><label><input type="checkbox" value="2" id="' . $name . '[' . $k . ']" name="' . $name . '[' . $k . ']" '  . checked( ( ! isset( $value_old[ $k ] ) || $value_old[ $k ] != 1 ), true, false ) . '/>';
    		echo $plugin['Name'] . '</label></p>';
    	}
    }

    function autoupdates_plugins_notification_callback_function( $args ) {
        extract( $args );
        $value_old = get_option( $name );
        if ( ! isset( $value_old ) ) {
            $value_old = 1;
        }

        echo '<input type="hidden" name="'. $name . '" value="0">';
        echo '<input type="checkbox" name="' . $name . '" id="'. $name . '" value="1"' . checked( $value_old, 1, false ) . '>';
    }
	function wps_text_info_function() {
		$html = '<p class="notice-wps">Nota : Les mise à jour automatiques peuvent se faire uniquement sur les plugins disponibles dans le Repository WordPress. </br > Pour les plugins premium vous devrez effectuer les mises à jour manuellement. <a href="https://wordpress.org/plugins/" title="Repository WordPress" target="_blank"> Consulter le repository WordPress</a>
	</p>';
		echo $html;
	}

    function autoupdates_settings_page() {
    ?>
    <div class="wrap">
    <h2>Mises à jour automatique WPserveur</h2>
	
    <?php 
        if ( current_user_can( 'update_core' ) ) {
            add_settings_section( 'autoupdates_core_setting_section',
                __( 'Mises à jour du Core de WordPress', 'autoupdates' ),
                '__return_false',
                'autoupdates' );

            add_settings_field( 'autoupdates_core',
                __( 'Mettre à jour le Core automatiquement?', 'autoupdates' ),
                'autoupdates_setting_callback_function',
                'autoupdates',
                'autoupdates_core_setting_section',
                array(
                    'options' => array(
        					'2' => __( 'Oui pour les mises à jour mineures et majeures', 'autoupdates' ),
        					'1' => __( 'Oui uniquement pour les mises à jour mineures', 'autoupdates' ),
        					'0'  => __( 'Ne pas mettre à jour automatiquement', 'autoupdates' ),
        					// 'dev'   => 'Mettre à jour les version de développement',
                        ),
                    'name' => 'autoupdates_core'
                 ) );
        }

        if ( current_user_can( 'update_plugins' ) ) {
            add_settings_section( 'autoupdates_plugins_setting_section',
                __( 'Mises à jour des plugins de WordPress', 'autoupdates' ),
                'wps_text_info_function',
                'autoupdates' );
				

					
            add_settings_field( 'autoupdates_plugins',
                __( 'Quels plugins mettre à jour automatiquement ?', 'autoupdates' ),
                'autoupdates_plugins_settings_callback_function',
                'autoupdates',
                'autoupdates_plugins_setting_section',
                array(
                    'name' => 'no_autoupdates_plugins'
                 ) );

            add_settings_section( 'autoupdates_plugins_notification_setting_section',
                __( 'Notifications', 'autoupdates' ),
                '__return_false',
                'autoupdates' );

            add_settings_field( 'autoupdates_plugins_notification',
                __( 'Me prévenir en case de mise à jour disponible', 'autoupdates' ),
                'autoupdates_plugins_notification_callback_function',
                'autoupdates',
                'autoupdates_plugins_notification_setting_section',
                array(
                    'label_for' => 'autoupdates_plugins_notification',
                    'name' => 'autoupdates_plugins_notification'
                 ) );
        }

         ?>
        <form method="post" action="options.php">
            <?php 
            settings_fields( 'autoupdates' );
            do_settings_sections( 'autoupdates' );
            echo '<p class="submit">';
                submit_button( '', 'primary large', 'submit', false );
            echo '</p>';
            ?>
        </form>
    </div>
    <?php
    }
}

/**
 Filtrer les Auto Updates
 */
add_filter( 'auto_update_plugin', 'willy_test_auto_updates_plugin', 10, 2 );
function willy_test_auto_updates_plugin( $update, $item ) {
	$no_autoupdates_plugins = (array)get_option( 'no_autoupdates_plugins' );
	if ( isset( $no_autoupdates_plugins[ $item->plugin ] ) && $no_autoupdates_plugins[ $item->plugin ] == 2 ) {
    	return true;
	} else {
    	return $update;
	}
}

// Code vilement choppé chez BoiteAWeb (par contre j'avais pas compris pourquoi tu as répété deux fois le premier filtre ligne 476)
// ... Sinon c'est vachement bien fait...
add_filter( 'allow_minor_auto_core_updates', 'willy_test_auto_updates_minor_core' );
function willy_test_auto_updates_minor_core( $upgrade_minor )
{
    $autoupdates_core = get_option( 'autoupdates_core' );
    if ( $autoupdates_core === false ) {
        $autoupdates_core = 1;
    }
    return (int)$autoupdates_core > 0;
}

add_filter( 'allow_major_auto_core_updates', 'willy_test_auto_updates_major_core' );
function willy_test_auto_updates_major_core( $upgrade_major )
{
    $autoupdates_core = (int)get_option( 'autoupdates_core' );
    return $autoupdates_core === 2;
}


/*
 * Envoi automatiquement un email lors des mises à jour auto
 */
add_filter( 'automatic_updates_send_debug_email', '__return_true' );

add_filter( 'cron_schedules', 'autoupdates_add_weekly_cron_schedule' );
function autoupdates_add_weekly_cron_schedule( $schedules ) {
    $schedules['weekly'] = array(
        'interval' => 604800, // 1 week in seconds
        'display'  => __( 'Once Weekly' ),
    );
 
    return $schedules;
}

add_action( 'update_plugins_notification', 'create_update_plugins_notification' );
if ( ! wp_next_scheduled( 'update_plugins_notification' ) ) {
    wp_schedule_event( time(), 'weekly', 'update_plugins_notification' );
}

function create_update_plugins_notification() {
    if ( get_option( 'autoupdates_plugins_notification' ) == 1 ) {
        global $wp_version;
        $cur_wp_version = preg_replace( '/-.*$/', '', $wp_version );
        do_action( "wp_update_plugins" ); // force WP to check plugins for updates
        $update_plugins = get_site_transient( 'update_plugins' ); // get information of updates
        if ( !empty( $update_plugins->response ) ) {
            $plugins_need_update = $update_plugins->response; // plugins that need updating
            $no_autoupdate_plugins = (array)get_option( 'no_autoupdates_plugins' );
        
            foreach( $no_autoupdate_plugins as $key => $value ) {
                if ( $value == 2 ) {
                    unset( $no_autoupdate_plugins[$key] );
                }
            }
        
            $plugins_need_update = array_intersect_key( $plugins_need_update, $no_autoupdate_plugins ); // only keep plugins that are not auto updating
        
            if ( count( $plugins_need_update ) >= 1 ) {
            	require_once( ABSPATH . 'wp-admin/includes/plugin-install.php' ); // Required for plugin API
            	require_once( ABSPATH . WPINC . '/version.php' ); // Required for WP core version
            	foreach ( $plugins_need_update as $key => $data ) { // loop through the plugins that need updating
            		$plugin_info = get_plugin_data( WP_PLUGIN_DIR . "/" . $key ); // get local plugin info
            		$info        = plugins_api( 'plugin_information', array( 'slug' => $data->slug ) ); // get repository plugin info
            		$message = '';
            		$message .= "\n" . sprintf( "L'extension : %s n'est plus à jour. Veuillez la mettre à jour de %s à %s" , $plugin_info['Name'], $plugin_info['Version'], $data->new_version ) . "\n";
            		$message .= "\n\nNous vous rappelons que ne pas tenir vos extensions à jour peut vous exposer à des risques de sécurité, mieux vaut prévenir que guérir ;)\n\nVous pouvez désactiver ces rappels depuis votre WordPress : Réglages >> Auto Updates >> Notifications\n";
            		$message .= "\n----------\n" . sprintf( "Message de service envoyé par https://wpserveur.net depuis votre site %s", home_url() ) . "\n";
            	}
        
	    		$subject  = sprintf( "Des mises à jour d'extensions sont disponibles sur %s", home_url() );
	    		wp_mail( get_option( 'admin_email' ), $subject, $message ); // send email
            }
        }
    }
}