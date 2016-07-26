                                <?php echo $before_widget; ?>
                                    <div class="section_title">
                                        <div class="widget-tab-titles">
                                            <ul id="myTab" class="nav nav-tabs" role="tablist">
                                                <li class="active">
                                                    <a href="#popular_tab<?=$id?>" role="tab" data-toggle="tab">
                                                        <h3 class="widgettitle"><?php _e('Popular',TEMPLATE_DMN) ?></h3>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#recent_tab<?=$id?>" role="tab" data-toggle="tab">
                                                        <h3 class="widgettitle"><?php _e('Recent',TEMPLATE_DMN) ?></h3>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#comments_tab<?=$id?>" role="tab" data-toggle="tab">
                                                        <h3 class="widgettitle"><?php _e('Comments',TEMPLATE_DMN) ?></h3>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="widget widget_taps">
                                        <div id="myTabContent" class="tab-content">
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
                                            <div class="tab-pane fade" id="recent_tab<?=$id?>">
                                                <ul class="posts_list">
                                                    <?php
                                                    query_posts( array('posts_per_page'=>$instance['number']) );
                                                    while (have_posts()) {
                                                        the_post();
                                                        include 'post.php';
                                                    }
                                                    wp_reset_query();
                                                ?>
                                                </ul> <!-- end posts list -->
                                            </div>
                                            <div class="tab-pane fade" id="comments_tab<?=$id?>">
                                                <ul class="posts_list">
                                                <?php
                                                $comments = get_comments('status=approve&number=5');
                                                foreach($comments as $comm) {
                                                ?>
                                                    <?php include 'comment.php'; ?>
                                                <?php } ?>
                                                </ul> <!-- end posts list -->
                                            </div>
                                        </div>
                                    </div>
                                <?php echo $after_widget; ?>