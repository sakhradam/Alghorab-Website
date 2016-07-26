<?php

function get_pagination_links($pages = '', $range = 1)
{
    global $wp_query;
    $links = array();

    if ($wp_query->max_num_pages <= 1)
    return $links;

    $showitems = ($range * 2)+1;
    global $paged;
    if( empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        if($paged > 2 && $paged > $range+1 && $showitems < $pages){
            //$links[] = array('link'=>get_pagenum_link(1),'label'=>__('« <span>First</span>',TEMPLATE_DMN) );
        }
        if($paged > 1 && $showitems < $pages) {
            $links[] = array('link'=>get_pagenum_link($paged - 1),'label'=>'« السابق' );
        }
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                if($paged == $i)
                    $links[] = array('link'=>'#','label'=>$i);
                else
                    $links[] = array('link'=>get_pagenum_link($i),'label'=>$i);
            }
        }
        if ($paged < $pages && $showitems < $pages)
            $links[] = array('link'=>get_pagenum_link($paged + 1),'label'=>'التالي »');
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
            //$links[] = array('link'=>get_pagenum_link($pages),'label'=>__('<span>Last</span> »',TEMPLATE_DMN) );
        }
    }

    return $links;
}

function bootstrap_pagination(){
    $links = get_pagination_links();
    if($links){
        ?>
        <ul class="pagination">
            <?php foreach ($links as $link) { ?>
                <li>
                    <a href="<?=$link['link']?>" class="btn btn-default"><?=$link['label']?></a>    
                </li>
            <?php } ?>
        </ul>
        <?php
    }
}