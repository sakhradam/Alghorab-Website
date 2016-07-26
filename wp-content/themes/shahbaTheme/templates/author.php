<section class="block">
    <div class="section_title">
        <h1><?php _e('Author :',TEMPLATE_DMN)?> <strong> <?php echo get_the_author()?> </strong></h1>
    </div>
    <div class="author">
        <div class="row">
            <div class="col-sm-2">
                <?php echo get_avatar( get_the_author_meta('ID') ); ?>
            </div>
            <div class="col-sm-10">
                <div class="auther_info">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="auther_name">
                                <?php echo get_the_author()?>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="social_2">
                                <ul class="row">
                                    <?php if(get_the_author_meta('shahbaTheme_facebook')){ ?>
                                    <li>
                                        <a target="_blank" href="<?php echo get_the_author_meta('shahbaTheme_facebook') ?>"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <?php } ?>

                                    <?php if(get_the_author_meta('shahbaTheme_vine')){ ?>
                                    <li>
                                        <a target="_blank" href="<?php echo get_the_author_meta('shahbaTheme_vine') ?>"><i class="fa fa-vine"></i></a>
                                    </li>
                                    <?php } ?>

                                    <?php if(get_the_author_meta('shahbaTheme_twitter')){ ?>
                                    <li>
                                        <a target="_blank" href="<?php echo get_the_author_meta('shahbaTheme_twitter') ?>"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <?php } ?>

                                    <?php if(get_the_author_meta('shahbaTheme_youtube')){ ?>
                                    <li>
                                        <a target="_blank" href="<?php echo get_the_author_meta('shahbaTheme_youtube') ?>"><i class="fa fa-youtube"></i></a>
                                    </li>
                                    <?php } ?>

                                    <?php if(get_the_author_meta('shahbaTheme_instagram')){ ?>
                                    <li>
                                        <a target="_blank" href="<?php echo get_the_author_meta('shahbaTheme_instagram') ?>"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <?php } ?>

                                    <?php if(get_the_author_meta('shahbaTheme_google-plus')){ ?>
                                    <li>
                                        <a target="_blank" href="<?php echo get_the_author_meta('shahbaTheme_google-plus') ?>"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <?php } ?>
                                    <li>
                                        <a target="_blank" href="<?php echo get_author_feed_link(get_the_author_meta('ID'))?>"><i class="fa fa-rss"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <p>
                    <?php the_author_meta( 'description' ); ?>
                </p>
            </div>
        </div>
    </div>
</section>