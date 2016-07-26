                                    <article>
                                        <div class="item_post">
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="item_title">
                                                    <span class="img_post_title">
                                                        <h3><?php the_title(); ?></h3>
                                                    </span>
                                                </div>
                                                <figure>
                                                    <img src="<?= shahbaHelper::thumbnail(get_the_id(),'featured-image') ?>" alt="img"/>
                                                </figure>
                                                <aside class="excerpt">
                                                    <span>
                                                    <h4><?php echo shahbaHelper::character_limiter(get_the_excerpt(),70); ?></h4>
                                                    </span>
                                                </aside>
                                            </a>
                                        </div>
                                    </article>