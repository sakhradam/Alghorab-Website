<?php global $shahbaConfig; ?>
<?php $counters = shahba_get_followers_counters();?>
    <?php echo $before_widget ?>
        <?php echo $before_title ?>
            <?php echo $title ?>
        <?php echo $after_title ?>
        <div class="widget social_meida_followers">
            <div class="row row_2">
                <?php if($counters['facebook']!==false) { ?>
                <div class="col-sm-2 col-md-4 col-xs-4 col-lx-6">
                    <a href="<?=$shahbaConfig['facebook_acc']?>" target="_blank">
                        <div class="time_counter" style="background-color: #4c66a3;">
                            <span><i class="fa fa-facebook"></i></span>
                            <span><h2><?=$counters['facebook']?></h2></span>
                            <span><h4><?php _e('Fans',TEMPLATE_DMN)?></h4></span>
                        </div>
                    </a>
                </div>
                <?php } ?>
                <div class="col-sm-2 col-md-4 col-xs-4 col-lx-6">
                    <a href="<?=$shahbaConfig['twitter_acc']?>" target="_blank">
                        <div class="time_counter" style="background-color: #2fc2ee;">
                            <span><i class="fa fa-twitter"></i></span>
                            <span><h2><?=$counters['twitter']?></h2></span>
                            <span><h4><?php _e('Followers',TEMPLATE_DMN)?></h4></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-2 col-md-4 col-xs-4 col-lx-6">
                    <a href="<?=$shahbaConfig['google_acc']?>" target="_blank">
                        <div class="time_counter" style="background-color: #de1935;">
                            <span><i class="fa fa-google-plus"></i></span>
                            <span><h2><?=$counters['google_plus']?></h2></span>
                            <span><h4><?php _e('Followers',TEMPLATE_DMN)?></h4></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-2 col-md-4 col-xs-4 col-lx-6">
                    <a href="<?=$shahbaConfig['yoututbe_acc']?>" target="_blank">
                        <div class="time_counter" style="background-color: #cd181f;">
                            <span><i class="fa fa-youtube"></i></span>
                            <span><h2><?=$counters['youtube']?></h2></span>
                            <span><h4><?php _e('Subscribers',TEMPLATE_DMN)?></h4></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-2 col-md-4 col-xs-4 col-lx-6">
                    <a href="<?=$shahbaConfig['instagram_usertitle']?>" target="_blank" >
                        <div class="time_counter" style="background-color: #17b2e8;">
                            <span><i class="fa fa-instagram"></i></span>
                            <span><h2><?=$counters['instagram']?></h2></span>
                            <span><h4><?php _e('Subscribers',TEMPLATE_DMN)?></h4></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-2 col-md-4 col-xs-4 col-lx-6">
                    <a href="#">
                        <div class="time_counter" style="background-color: #ea4c89;">
                            <span><i class="fa fa-pencil"></i></span>
                            <span><h2><?=$counters['posts']?></h2></span>
                            <span><h4><?php _e('Posts',TEMPLATE_DMN) ?></h4></span>
                        </div>
                    </a>
                </div>
            </div>
        </div> <!-- end social_meida_followers -->
    <?php echo $after_widget ?>