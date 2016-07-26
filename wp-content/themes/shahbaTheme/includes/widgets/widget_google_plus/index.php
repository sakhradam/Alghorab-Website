<?php

if(!class_exists('google_plus_widget')) {

    class google_plus_widget extends ShahbaWidget
    {
        function args()
        {
            return array(
                'label' => __( 'SHAHBA - Google Plus Box' ,TEMPLATE_DMN),
                'description' => __( 'Google Plus Box' ,TEMPLATE_DMN),
                'slug' => 'shahba_google_plus_box',
                'fields' => array(
                    array(
                        'name' => __( 'Title' ,TEMPLATE_DMN),
                        'desc' => __( 'Enter the widget title.' ,TEMPLATE_DMN),
                        'id' => 'title',
                        'type'=>'text',
                        'class' => 'widefat',
                        'std' => __( 'Google Plus' ,TEMPLATE_DMN),
                        'validate' => 'alpha_dash',
                        'filter' => 'strip_tags|esc_attr'
                     ),
                    array(
                        'name' => __( 'Page' ,TEMPLATE_DMN),
                        'desc' => __( 'Enter the Page URL.' ,TEMPLATE_DMN),
                        'id' => 'page',
                        'type'=>'text',
                        'class' => 'widefat',
                        'std' => '//plus.google.com/u/0/113217984529217139752',
                        'validate' => 'alpha_dash',
                        'filter' => 'strip_tags|esc_attr'
                     ),
                    array(
                        'name' => __( 'Color Schema' ,TEMPLATE_DMN),
                        'desc' => __( '', TEMPLATE_DMN ),
                        'id' => 'colorscheme',
                        'type'=>'select',
                        // selectbox fields
                        'fields' => array(
                            array(
                                'name'  => __( 'Light', TEMPLATE_DMN ),
                                'value' => 'light'
                             ),
                            array(
                                'name'  => __( 'Dark', TEMPLATE_DMN ),
                                'value' => 'dark'
                             ),
                        ),
                        'filter' => 'strip_tags|esc_attr',
                    ),
                    array(
                        'name' => __( 'Layout' ,TEMPLATE_DMN),
                        'desc' => __( '', TEMPLATE_DMN ),
                        'id' => 'layout',
                        'type'=>'select',
                        // selectbox fields
                        'fields' => array(
                            array(
                                'name'  => __( 'Portrait', TEMPLATE_DMN ),
                                'value' => 'portrait'
                             ),
                            array(
                                'name'  => __( 'Landscape', TEMPLATE_DMN ),
                                'value' => 'landscape'
                             ),
                        ),
                        'filter' => 'strip_tags|esc_attr',
                    ),
                    array(
                        'name' => __( 'Width' ,TEMPLATE_DMN),
                        'desc' => __( '' ,TEMPLATE_DMN),
                        'id' => 'width',
                        'type'=>'text',
                        'class' => 'widefat',
                        'std' => '360',
                        'validate' => 'alpha_dash',
                        'filter' => 'strip_tags|esc_attr'
                     ),
                    array(
                        'name' => __( 'Cover Photo', TEMPLATE_DMN ),
                        'desc' => __( '', TEMPLATE_DMN ),
                        'id' => 'cover_photo',
                        'type'=>'checkbox',
                        'std' => 1, // 0 or 1
                        'filter' => 'strip_tags|esc_attr',
                    ),
                    array(
                        'name' => __( 'Tagline', TEMPLATE_DMN ),
                        'desc' => __( '', TEMPLATE_DMN ),
                        'id' => 'tagline',
                        'type'=>'checkbox',
                        'std' => 1, // 0 or 1
                        'filter' => 'strip_tags|esc_attr',
                    ),
                ) // fields array
            );
        }
    }
    new google_plus_widget();
}