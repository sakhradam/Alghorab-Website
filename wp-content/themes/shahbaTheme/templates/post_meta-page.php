<div class="meta">
    <span class="comments">
        <a href="<?php comments_link(); ?>"><i class="fa fa-comment-o"></i><?php comments_number( '0', '1', '%' ); ?></a>
    </span>
    <span class="writer">
        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>">
            <i class="fa fa-user"></i>
            <?php the_author(); ?>
        </a>
    </span>
    <span class="date"><i class="fa fa-clock-o"></i>
        <time datetime="">
            <?php echo get_the_date(); ?>
        </time>
    </span>
</div>