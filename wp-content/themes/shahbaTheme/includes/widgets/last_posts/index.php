<?php

if(!class_exists('shahba_last_posts_widget')) {
    class shahba_last_posts_widget extends ShahbaWidget
    {
        function args()
        {
            return array(
                'label' => __( 'SHAHBA - Last Posts' ,TEMPLATE_DMN),
                'description' => __( 'SHAHBA - Last Posts' ,TEMPLATE_DMN),
                'slug' => 'shahba_last_posts',
                'fields' => array(
                    array(
                        'name' => __( 'Tite' ,TEMPLATE_DMN),
                        'desc' => '',
                        'id' => 'title',
                        'type'=>'text',
                        'class' => 'widefat',
                        'std' => __( 'Last Posts' ,TEMPLATE_DMN),
                        'validate' => 'alpha_dash',
                        'filter' => 'strip_tags|esc_attr'
                     ),
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
    new shahba_last_posts_widget();
}