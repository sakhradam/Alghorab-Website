<?php

if(!class_exists('shahba_imgs_posts_widget')) {

    class shahba_imgs_posts_widget extends ShahbaWidget
    {
        function args()
        {
            $_categories = get_categories();
            $categories = array();
            $categories[]= array('name'=>'كل التصنيفات','value'=>'');
            foreach ($_categories as $key => $cat) {
                $categories[] = array('name'=>$cat->name,'value'=>$cat->term_id);
            }
            
            return array(
                'label' => __( 'SHAHBA - Images Posts Widget' ,TEMPLATE_DMN),
                'description' => __( 'SHAHBA - Images Posts Widget' ,TEMPLATE_DMN),
                'slug' => 'shahba_imgs_posts_widget',
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
                    array(
                        'name' => __( 'Category' ,TEMPLATE_DMN),
                        'id' => 'category',
                        'type'=>'select',
                        // selectbox fields
                        'fields' => $categories,
                        'filter' => 'strip_tags|esc_attr',
                     ),
                ) // fields array
            );
        }
    }
    new shahba_imgs_posts_widget();
}