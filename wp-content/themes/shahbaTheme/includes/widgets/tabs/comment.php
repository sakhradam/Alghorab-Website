            <li>
                <div class="row row_3">
                    <div class="attachment_post_thumbnail">
                        <figure>
                            <a href="<?php echo get_permalink($comm->comment_post_ID); ?>">
                                <img src="<?php echo shahbaHelper::thumbnail($comm->comment_post_ID,array(70,70)) ?>" alt="img"/>
                            </a>
                        </figure>
                    </div>
                    <div class="content">
                        <div class="blog_list_info">
                            <div class="item_title_1">
                                <a href="<?php echo get_permalink($comm->comment_post_ID); ?>" class="main_color">
                                    <h3>
                                        <?php echo get_the_title($comm->comment_post_ID); ?>
                                    </h3>
                                </a>
                            </div>
                            <p>
                            <?php echo shahbaHelper::character_limiter($comm->comment_content,60);?>
                            </p>
                        </div>
                    </div>
                </div>
            </li>