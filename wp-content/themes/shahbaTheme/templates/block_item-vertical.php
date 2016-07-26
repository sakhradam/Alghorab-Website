                                        <div class="col-sm-6">
                                            <article class="main_article main_article_style_1">
                                                <a href="<?php the_permalink(); ?>">
                                                    <div class="item_title">
                                                        <span class="img_post_title">
                                                            <h3><?php the_title(); ?></h3>
                                                        </span>
                                                    </div>
                                                    <figure>
                                                        <img src="<?php echo shahbaHelper::thumbnail(get_the_id(),'featured-image') ?>" alt="img"/>
                                                    </figure>
                                                </a>

                                                <?php shahba_posted_on(); ?>

                                                <aside class="excerpt">
                                                    <p><?php echo shahbaHelper::character_limiter(get_the_excerpt(),150);?></p>
                                                </aside>
                                            </article> <!-- end main article -->
                                        </div>