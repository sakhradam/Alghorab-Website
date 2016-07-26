                                <section class="block">
                                    <div class="section_title">
                                        <h1><?php echo $block->title; ?></h1>
                                    </div>
                                    <?php
                                    $options = get_option( 'shahbaOptions' );
                                    query_posts( array( 'cat'=>$block->category,'showposts'=>$block->showposts)
                                    );
                                    $first = true;
                                    if ( have_posts() ) : while ( have_posts() ) : the_post();

                                            get_template_part( 'templates/block_item','horizontal' );

                                    endwhile;
                                    endif;
                                    wp_reset_query();
                                    ?>
                                </section> <!-- end main block -->