<?php
// classes
include 'classes/wph-widget-class.php';
include 'classes/ShahbaWidget.php';
// widgets
include 'widget_fb_likebox/index.php';
include 'widget_google_plus/index.php';
include 'followers-counter/social-counter.php';
include 'tabs/index.php';
include 'logo_and_text/index.php';
include 'last_posts/index.php';
include 'ads/ads.php';
include 'vertical_ads/ads.php';
include 'imgs_posts/index.php';
if(is_admin()){
    include 'admin-info-widget/index.php';
}