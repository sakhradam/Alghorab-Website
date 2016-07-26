<div class="widget img_bost_widget">
        <div class="blocks">
            <div class="row">
            <?php
            query_posts( array('cat'=>$instance['category'],'showposts'=>$instance['number']) );
            $first = true;
            if ( have_posts() ) : while ( have_posts() ) : the_post();
            ?>
            <div class="col-sm-12">
                <?php get_template_part( 'templates/block_item','image' ); ?>
            </div>
            <?php
            $first = false;
            endwhile;
            endif;
            wp_reset_query();
            ?>
            </div>
        </div> <!-- end blocks -->
</div>