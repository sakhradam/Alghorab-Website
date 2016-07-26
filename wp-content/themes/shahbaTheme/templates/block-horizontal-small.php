                                <section class="block">
                                    <div class="section_title">
                                        <h1><?php echo $block->title; ?></h1>
                                    </div>
                                    <?php
                                    $options = get_option( 'shahbaOptions' );
                                    query_posts( array( 'cat'=>$block->category,'showposts'=>'1')
                                    );
                                    $first = true;
                                    if ( have_posts() ) : while ( have_posts() ) : the_post();

                                            get_template_part( 'templates/block_item','horizontal' );

                                    endwhile;
                                    endif;
                                    wp_reset_query();
                                    ?>

                                    <ul class="posts_list_1">
                                        <div class="row">
                                        <?php
                                        $i=0;

                                        $options = get_option( 'shahbaOptions' );
                                        query_posts( array('cat'=>$block->category,'offset'=>1,'showposts'=>$block->showposts-1));
                                        global $wp_query;
                                        $count = $wp_query->post_count;
                                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                                        $i++;
                                            ?>
                                            <div class="col-sm-6" >
                                                <?php get_template_part( 'templates/block_item','small' ); ?>
                                            </div>
                                            <?php
                                            if($i%2==0 && $i!=$count){
                                                echo '</div>';
                                                echo ('<div class="row">');
                                            }
                                        endwhile;
                                        endif;
                                        wp_reset_query();
                                        ?>
                                        </div>
                                    </ul> <!-- end posts list -->

                                </section> <!-- end main block -->