<?php

if(!class_exists('fb_likebox_widget')) {
    class fb_likebox_widget extends ShahbaWidget
    {
        function args()
        {
            return array(
                'label' => __( 'SHAHBA - Facebook Like Box' ,TEMPLATE_DMN),
                'description' => __( 'Facebook Like Box' ,TEMPLATE_DMN),
                'slug' => 'shahba_facebook_like_box',
                'fields' => array(
                    array(
                        'name' => __( 'Title' ,TEMPLATE_DMN),
                        'desc' => __( 'Enter the widget title.' ,TEMPLATE_DMN),
                        'id' => 'title',
                        'type'=>'text',
                        'class' => 'widefat',
                        'std' => __( 'Facebook' ,TEMPLATE_DMN),
                        'validate' => 'alpha_dash',
                        'filter' => 'strip_tags|esc_attr'
                     ),
                    array(
                        'name' => __( 'Page' ,TEMPLATE_DMN),
                        'desc' => __( 'Enter the Page URL.' ,TEMPLATE_DMN),
                        'id' => 'page',
                        'type'=>'text',
                        'class' => 'widefat',
                        'std' => 'http://facebook.com/shahbasoft',
                        'validate' => 'alpha_dash',
                        'filter' => 'strip_tags|esc_attr'
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
                        'name' => __( 'Height' ,TEMPLATE_DMN),
                        'desc' => __( '' ,TEMPLATE_DMN),
                        'id' => 'height',
                        'type'=>'text',
                        'class' => 'widefat',
                        'std' => '300',
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
                        'name' => __( 'Header', TEMPLATE_DMN ),
                        'desc' => __( '', TEMPLATE_DMN ),
                        'id' => 'header',
                        'type'=>'checkbox',
                        'std' => 0, // 0 or 1
                        'filter' => 'strip_tags|esc_attr',
                    ),
                    array(
                        'name' => __( 'Show Faces', TEMPLATE_DMN ),
                        'desc' => __( '', TEMPLATE_DMN ),
                        'id' => 'show_faces',
                        'type'=>'checkbox',
                        'std' => 0, // 0 or 1
                        'filter' => 'strip_tags|esc_attr',
                    ),
                    array(
                        'name' => __( 'Show Posts', TEMPLATE_DMN ),
                        'desc' => __( '', TEMPLATE_DMN ),
                        'id' => 'stream',
                        'type'=>'checkbox',
                        'std' => 1, // 0 or 1
                        'filter' => 'strip_tags|esc_attr',
                    ),
                    array(
                        'name' => __( 'Show Border', TEMPLATE_DMN ),
                        'desc' => __( '', TEMPLATE_DMN ),
                        'id' => 'show_border',
                        'type'=>'checkbox',
                        'std' => 0, // 0 or 1
                        'filter' => 'strip_tags|esc_attr',
                    ),
                ) // fields array
            );
        }
    }
    new fb_likebox_widget();
}