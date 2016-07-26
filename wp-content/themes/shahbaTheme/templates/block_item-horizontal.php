                                    <article class="main_article main_article_style_2">
                                        <div class="row">
                                            <div class="col-sm-6">
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
                                            </div>
                                            <div class="col-sm-6">
                                                <?php shahba_posted_on() ?>
                                                <aside class="excerpt">
                                                    <p><?php echo shahbaHelper::character_limiter(get_the_excerpt(),250);?></p>
                                                </aside>
                                            </div>
                                        </div>
                                    </article> <!-- end main article -->