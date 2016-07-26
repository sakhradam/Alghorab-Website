<?php

if(!class_exists('shahba_tabs_widget')) {
    class shahba_tabs_widget extends ShahbaWidget
    {
        function args()
        {
            return array(
                'label' => __( 'SHAHBA - Tabs' ,TEMPLATE_DMN),
                'description' => __( 'SHAHBA - Tabs' ,TEMPLATE_DMN),
                'slug' => 'shahba_tabs',
                'fields' => array(
                    array(
                        'name' => __( 'Number of posts' ,TEMPLATE_DMN),
                        'desc' => '',
                        'id' => 'number',
                        'type'=>'text',
                        'class' => 'widefat',
                        'std' => 4,
                        'validate' => 'alpha_dash',
                        'filter' => 'strip_tags|esc_attr'
                     ),
                ) // fields array
            );
        }
    }
    new shahba_tabs_widget();
}