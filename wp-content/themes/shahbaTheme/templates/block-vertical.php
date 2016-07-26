                                <section class="block">
                                    <div class="section_title">
                                        <h1><?php echo $block->title; ?></h1>
                                    </div>
                                    <div class="row">
                                        <?php
                                        $i=0;
                                        $options = get_option( 'shahbaOptions' );
                                        query_posts( array('cat'=>$block->category,'showposts'=>$block->showposts)
                                        );
                                        global $wp_query;
                                        $count = $wp_query->post_count;
                                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                                        $i++;

                                            get_template_part( 'templates/block_item','vertical' );

                                        if($i%2==0 && $i!=$count){
                                            echo '</div>';
                                            echo '<div class="row">';
                                        }

                                        endwhile;
                                        endif;
                                        wp_reset_query();
                                        ?>
                                    </div>
                                </section> <!-- end main block -->