                                <section class="block">
                                    <div class="section_title">
                                        <h1><?php echo $block->title; ?></h1>
                                    </div>
                                        <div>
                                            <ul class="posts_list_1">
                                                    <?php
                                                    $i=0;
                                                    echo '<div class="row">';
                                                    query_posts( array('cat'=>$block->category,'offset'=>1,'showposts'=>$block->showposts));
                                                    global $wp_query;
                                                    $count = $wp_query->post_count;
                                                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                                                        $i++;
                                                        ?>
                                                            <div class="col-sm-6" >
                                                                <?php get_template_part( 'templates/block_item','small' );?>
                                                            </div>
                                                        <?php
                                                        if($i%2==0 && $i!=$count){
                                                            echo '</div>';
                                                            echo '<div class="row">';
                                                        }
                                                        endwhile;
                                                    endif;
                                                    echo '</div>';
                                                    wp_reset_query();
                                                    ?>
                                            </ul> <!-- end posts list -->
                                        </div>
                                </section> <!-- end main block -->