<?php

class shahbaHelper {
    static function check_license(){
        $result = get_transient( 'shahba_license' );
        if (false === $result ) {
            $res = @file_get_contents( 'http://shahbasoft.com/check_license.php?url='.base64_encode( get_bloginfo('url') ) );
            $result = @json_decode($res);
            if($result)
            set_transient( 'shahba_license', $result, 3600);
        }
        $result = (@$result->license == 'activated');
        return $result;
    }
	static function character_limiter($str, $n = 500, $end_char = '&#8230;')
	{
		if (strlen($str) < $n)
		{
			return $str;
		}

		$str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

		if (strlen($str) <= $n)
		{
			return $str;
		}

		$out = "";
		foreach (explode(' ', trim($str)) as $val)
		{
			$out .= $val.' ';

			if (strlen($out) >= $n)
			{
				$out = trim($out);
				return (strlen($out) == strlen($str)) ? $out : $out.$end_char;
			}
		}
	}
    static function get_related_args($showposts = 4)
    {
        global $post;
        $post_type = $post->post_type;
        $args = array(
            'post__not_in' => array($post->ID),
            'showposts'=> $showposts,
            'ignore_sticky_posts'=>1
        );
        $tax_args = array();
        $taxonomy_names = array('category');
        foreach ($taxonomy_names as $taxonomy) {
            $terms = wp_get_post_terms( $post->ID, $taxonomy);
            $terms = array(array_pop($terms));
            foreach ($terms as $term) {
                $tax_args[] = array(
                    'taxonomy' => $taxonomy,
                    'field' => 'id',
                    'terms' => $term->term_id,
                );
            }
        }
        if($tax_args){
            $args['tax_query']=$tax_args;
        } else {
            $args['post_type']=$post_type;
        }
        return $args;
    }
    static function thumbnail($post_id='',$size='',$alt=true)
    {
        if(! $post_id){
            global $post;
            $post_id = $post->ID;
        }
        $thumb_id = get_post_thumbnail_id($post_id);
        $url = '';
        if($thumb_id) {
            $src = wp_get_attachment_image_src( $thumb_id, $size );
            $url = $src[0];
        } elseif($alt) {
            global $shahbaConfig;
            $src =  $shahbaConfig['alt_img'];
            $url = $src['url'];
        }
        return $url;
    }
    static function reduxColor2rgba($color) {
        $hex = $color['color'];
        $alpha = $color['alpha'];
       $hex = str_replace("#", "", $hex);

       if(strlen($hex) == 3) {
          $r = hexdec(substr($hex,0,1).substr($hex,0,1));
          $g = hexdec(substr($hex,1,1).substr($hex,1,1));
          $b = hexdec(substr($hex,2,1).substr($hex,2,1));
       } else {
          $r = hexdec(substr($hex,0,2));
          $g = hexdec(substr($hex,2,2));
          $b = hexdec(substr($hex,4,2));
       }
       $rgba = array($r, $g, $b,$alpha);
       return "rgba(".implode(",", $rgba).")";
    }
    static function get_option($id,$default=NULL){
        global $shahbaConfig;
        if(isset($shahbaConfig[$id])){
            return $shahbaConfig[$id];
        }
        return $default;
    }
    static function validate_block($block){
        if(!isset($block->title)){
            $block->title = '';
        }
        if(!isset($block->category)){
            $block->category = get_option('default_category');
        }
        if(!isset($block->showposts)){
            $block->showposts = 5;
        }
        if(!isset($block->style)){
            $block->style = 'vertical-small';
        }
        return $block;
    }
}