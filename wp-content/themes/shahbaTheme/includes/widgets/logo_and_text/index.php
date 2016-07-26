<?php

if(!class_exists('shahba_tabs_logo_txt_widget')) {
    class shahba_tabs_logo_txt_widget extends ShahbaWidget
    {
        function args()
        {
            return array(
                'label' => __( 'SHAHBA - Logo & Text' ,TEMPLATE_DMN),
                'description' => __( 'SHAHBA - Logo & Text' ,TEMPLATE_DMN),
                'slug' =>'shahba_logo_text',
                'fields' => array(
                    array(
                        'name' => __( 'Logo' ,TEMPLATE_DMN),
                        'desc' => __( 'Enter the Logo Url.' ,TEMPLATE_DMN),
                        'id' => 'logo',
                        'type'=>'textarea',
                        'class' => 'widefat',
                        'std' => '',
                        'validate' => 'alpha_dash',
                        'filter' => 'strip_tags|esc_attr'
                     ),
                    array(
                        'name' => __( 'Text' ,TEMPLATE_DMN),
                        'desc' => __( 'Enter the Text.' ,TEMPLATE_DMN),
                        'id' => 'text',
                        'type'=>'textarea',
                        'class' => 'widefat',
                        'std' => '',
                        'validate' => 'alpha_dash',
                        'filter' => 'strip_tags|esc_attr'
                     )
                ) // fields array
            );
        }
    }
    new shahba_tabs_logo_txt_widget();
}