<?php

class ShahbaWidget extends WPH_Widget {
    function __construct()
    {
        $args = $this->args();
        $this->create_widget( $args );
        add_action("widgets_init", array(&$this, "register"));
    }
    function register()
    {
        register_widget( get_class($this) );
    }
    function widget( $args, $instance )
    {
        extract( $args );
        $reflection = new ReflectionClass($this);
        $directory = dirname($reflection->getFileName()) ;
        include $directory.'/tpl.php';
    }
    function create_field_devider($key, $out = ""){
        return '<hr/>';
    }
    function create_field_h1($key, $out = ""){
        return '<h1>'.$key['name'].'</h1>';
    }
    function create_field_h4($key, $out = ""){
        return '<h4>'.$key['name'].'</h4>';
    }
}