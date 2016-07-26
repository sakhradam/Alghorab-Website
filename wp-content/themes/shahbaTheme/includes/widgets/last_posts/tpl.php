<?php echo $before_widget; ?>
    <?php echo $before_title; ?>
        <?php echo $instance['title']; ?>
    <?php echo $after_title; ?>

    <div class="tab-pane fade in active" id="popular_tab<?=$id?>">
        <ul class="posts_list">
            <?php
            query_posts(array(
                'posts_per_page'=>$instance['number'],
                'orderby'=>'comment_count'
            ));
            while (have_posts()) {
                the_post();
                include 'post.php';
            }
            wp_reset_query();
            ?>
        </ul> <!-- end posts list -->
    </div>



<?php echo $after_widget; ?>
