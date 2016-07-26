                                <section class="block">
                                    <div class="section_title">
                                        <h1><?php echo $block->title; ?></h1>
                                    </div>
                                    <div class="row">
                                        <?php
                                        $options = get_option( 'shahbaOptions' );
                                        query_posts( array('cat'=>$block->category,'showposts'=>1)
                                        );
                                        if ( have_posts() ) : while ( have_posts() ) : the_post();

                                            get_template_part( 'templates/block_item','vertical' );

                                        endwhile;
                                        endif;
                                        wp_reset_query();
                                        ?>
                                        <div class="col-sm-6">
                                            <ul class="posts_list">
                                                <?php
                                                $options = get_option( 'shahbaOptions' );
                                                query_posts( array('cat'=>$block->category,'offset'=>1,'showposts'=>$block->showposts-1));
                                                if ( have_posts() ) : while ( have_posts() ) : the_post();

                                                    get_template_part( 'templates/block_item','small' );

                                                endwhile;
                                                endif;
                                                wp_reset_query();
                                                ?>
                                            </ul> <!-- end posts list -->
                                        </div>
                                    </div>
                                </section> <!-- end main block -->