<div class="meta">
    <?php
    $cats = wp_get_post_categories( get_the_id() );
    if(!is_single()){
        $cats = array( array_pop($cats) );
    }
    if(is_single() or shahbaHelper::get_option('category_able') ){
    foreach ($cats as $cat_ID) {
    ?>
        <span class="entry_cat_bg cat<?php echo $cat_ID ?>_bg">
            <a href="<?php echo get_category_link($cat_ID) ?>">
                <?php echo get_the_category_by_ID( $cat_ID ) ?>
            </a>
        </span>
    <?php }} ?>
    <span class="comments">
        <a href="<?php comments_link(); ?>"><i class="fa fa-comment-o"></i><?php comments_number( '0', '1', '%' ); ?></a>
    </span>
    <?php if(is_single() or shahbaHelper::get_option('author_able') ){ ?>
    <span class="writer">
        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>">
            <i class="fa fa-user"></i>
            <?php the_author(); ?>
        </a>
    </span>
    <?php } ?>
    <span class="date"><i class="fa fa-clock-o"></i><time datetime=""><?php echo get_the_date(); ?></time></span>
    <?php if(is_single()){ ?>
    <span>
        <?php the_tags() ?>
    </span>
    <?php } ?>
</div>