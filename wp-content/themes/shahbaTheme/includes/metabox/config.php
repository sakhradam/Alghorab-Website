<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */


add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) ) require_once 'init.php';

}


add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {
    $prefix = 'shahbaTheme_';
    /**
     * Metabox for the user profile screen
     */
    $meta_boxes['shahba_user_edit'] = array(
        'id'         => 'shahba_user_edit',
        'title'      => __( 'Social Links', TEMPLATE_DMN ),
        'pages'      => array( 'user' ), // Tells CMB to use user_meta vs post_meta
        'show_names' => true,
        'cmb_styles' => false, // Show cmb bundled styles.. not needed on user profile page
        'fields'     => array(
            array(
                'name'     => __( 'Social Links', TEMPLATE_DMN ),
                'desc'     => __( '', TEMPLATE_DMN ),
                'id'       => $prefix . '_',
                'type'     => 'title',
                'on_front' => false,
            ),
            array(
                'name'     => __( 'Facebook', TEMPLATE_DMN ),
                'desc'     => __( '', TEMPLATE_DMN ),
                'id'       => $prefix . 'facebook',
                'type'     => 'text',
                'on_front' => false,
            ),
            array(
                'name'     => __( 'Twitter', TEMPLATE_DMN ),
                'desc'     => __( '', TEMPLATE_DMN ),
                'id'       => $prefix . 'twitter',
                'type'     => 'text',
                'on_front' => false,
            ),
            array(
                'name'     => __( 'Youtube', TEMPLATE_DMN ),
                'desc'     => __( '', TEMPLATE_DMN ),
                'id'       => $prefix . 'youtube',
                'type'     => 'text',
                'on_front' => false,
            ),
            array(
                'name'     => __( 'Google plus', TEMPLATE_DMN ),
                'desc'     => __( '', TEMPLATE_DMN ),
                'id'       => $prefix . 'google-plus',
                'type'     => 'text',
                'on_front' => false,
            ),
            array(
                'name'     => __( 'RSS', TEMPLATE_DMN ),
                'desc'     => __( '', TEMPLATE_DMN ),
                'id'       => $prefix . 'rss',
                'type'     => 'text',
                'on_front' => false,
            ),
            array(
                'name'     => __( 'Instagram', TEMPLATE_DMN ),
                'desc'     => __( '', TEMPLATE_DMN ),
                'id'       => $prefix . 'instagram',
                'type'     => 'text',
                'on_front' => false,
            ),
            array(
                'name'     => __( 'vine', TEMPLATE_DMN ),
                'desc'     => __( '', TEMPLATE_DMN ),
                'id'       => $prefix . 'vine',
                'type'     => 'text',
                'on_front' => false,
            ),
        )
    );
    return $meta_boxes;
}

function cmb_taxonomy_meta_initiate() {
    $meta_box = array(
        'id'         => 'cat_options',
        'show_on'    => array( 'key' => 'options-page', 'value' => array( 'unknown', ), ),
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name' => __( 'Category Color', 'taxonomy-metadata' ),
                'desc' => __( '', 'taxonomy-metadata' ),
                'id'   => 'color', // no prefix needed since the options are one option array.
                'type' => 'colorpicker',
				'default' => '#d84833'
            ),
        )
    );
    new Taxonomy_MetaData_CMB( 'category', $meta_box, __( '', 'taxonomy-metadata' ) );
}
cmb_taxonomy_meta_initiate();