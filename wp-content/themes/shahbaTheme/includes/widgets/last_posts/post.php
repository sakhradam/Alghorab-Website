                <li>
                    <div class="row row_3">
                        <div class="attachment_post_thumbnail">
                            <figure>
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo shahbaHelper::thumbnail(get_the_id(),array(70,70)) ?>" alt="img"/>
                                </a>
                            </figure>
                        </div>
                        <div class="content">
                            <div class="blog_list_info">
                                <div class="item_title_1">
                                    <a href="<?php the_permalink(); ?>" class="main_color">
                                        <h3><?php the_title(); ?></h3>
                                    </a>
                                </div>
                                <p><?php echo shahbaHelper::character_limiter(get_the_excerpt(),20);?></p>
                                <?php //shahba_posted_on(); ?>
                            </div>
                        </div>
                    </div>
                </li>