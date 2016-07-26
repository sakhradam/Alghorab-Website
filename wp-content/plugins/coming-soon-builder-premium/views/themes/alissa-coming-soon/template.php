<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( get_option('mmp_seo_meta') !== '' ): ?>
    <meta name="description" content="<?php esc_attr_e(get_option('mmp_seo_meta')) ?>" />
    <?php endif; ?>

    <?php if ( get_option('mmp_favicon') !== '' ): ?>
    <link rel="icon" type="image/png" href="<?php echo esc_url(get_option('mmp_favicon')) ?>">
    <?php endif; ?>

    <title><?php esc_html_e(get_option('mmp_title')) ?></title>
        <!-- CSS -->

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:400,700'>

         <!-- Bootstrap -->
        <link href="<?php echo wpmmp_css_url( 'public/bootstrap/css/bootstrap.min.css' ) ?>" rel="stylesheet">

        <link href="<?php echo wpmmp_css_url( 'public/bootstrap/css/bootstrap-theme.min.css' ) ?>" rel="stylesheet">
        
        <link href="<?php echo plugins_url( 'assets/css/style.css' , __FILE__ ) ?>" rel="stylesheet">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        

        <?php wp_print_scripts( array( 'jquery' ) ) ?>

        <script>$ = jQuery; cd_date = '<?php echo $cd_date ?>';bg_1 = "<?php echo plugins_url( 'assets/img/backgrounds/1.jpg', __FILE__ ) ?>";
        <?php if ( get_option('mmp_background_image') ): ?>
        bg_1 = "<?php echo esc_url(get_option('mmp_background_image')) ?>";
        <?php endif; ?>
        </script>

        <script src="<?php echo wpmmp_css_url( 'public/bootstrap/js/bootstrap.min.js' ) ?>"></script>

        <script src="<?php echo plugins_url( 'assets/js/jquery.backstretch.min.js', __FILE__ ) ?>"></script>

        <script src="<?php echo plugins_url( 'assets/js/jquery.countdown.js' , __FILE__ ) ?>"></script>

        <script src="<?php echo plugins_url( 'assets/js/scripts.js', __FILE__ ) ?>"></script>


        <?php do_action( 'wpmmp_head' ) ?>

    </head>

    <body>

        <!-- Header -->
        <div class="container">
            <div class="header row">
                <div class="logo span4">
                    <h1><a href="">
                    <?php if ( get_option('mmp_logo') === '' ): ?>
                    <?php esc_html_e(get_option('mmp_title')) ?>
                    <?php else: ?>
                    <img id="logo" src="<?php echo esc_url(get_option('mmp_logo')) ?>" />
                    <?php endif; ?>
                    </a> <span>.</span></h1>
                </div>
                <div class="call-us span8">
                    <p><?php esc_html_e(get_option('mmp_subheading')) ?></p>
                </div>
            </div>
        </div>

        <!-- Coming Soon -->
        <div class="coming-soon">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <h2><?php esc_html_e(get_option('mmp_headline')) ?></h2>
                            
                            <?php if ( get_option('mmp_on_off_countdown') === '1' ): ?>
                            <div class="timer">
                                <div class="days-wrapper">
                                    <span class="days"></span> <br>days
                                </div>
                                <div class="hours-wrapper">
                                    <span class="hours"></span> <br>hours
                                </div>
                                <div class="minutes-wrapper">
                                    <span class="minutes"></span> <br>minutes
                                </div>
                                <div class="seconds-wrapper">
                                    <span class="seconds"></span> <br>seconds
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="container">

            <div class="row">
            <div id="content">
              <?php echo  $this->_content( get_option('mmp_message') )  ?>
            </div>
            </div>
            
            <div class="row">
                <div class="span12 subscribe">
                    <?php $this->add_email_form() ?>
                </div>
            </div>
            
            <div class="row">
                <div class="span12 social">
                    <span>
                    <?php if ( get_option('mmp_show_fb') === '1' ): ?>
                    <a href="<?php echo esc_url(get_option('mmp_fb_page')) ?>"><img class="facebook w3-image mm-img-social" src="<?php echo wpmmp_image_url('fb.png') ?>"></a>
                    <?php endif; ?>

                    <?php if ( get_option('mmp_show_tw') === '1' ): ?>
                    <a href="<?php echo esc_url(get_option('mmp_tw_page')) ?>"><img class="twitter w3-image mm-img-social" src="<?php echo wpmmp_image_url('twitter.png') ?>"></a>
                    <?php endif; ?>
            
                    <?php if ( get_option('mmp_show_insta') === '1' ): ?>
                    <a href="<?php echo esc_url(get_option('mmp_insta_page')) ?>"><img class="instagram w3-image mm-img-social" src="<?php echo wpmmp_image_url('instagram.png') ?>"></a>
                    <?php endif; ?>
           
                    <?php if ( get_option('mmp_show_pin') === '1' ): ?>
                    <a href="<?php echo esc_url(get_option('mmp_pin_page')) ?>"><img class="pinterest w3-image mm-img-social" src="<?php echo wpmmp_image_url('pinterest.png') ?>"></a>
                    <?php endif; ?>

                    <?php if ( get_option('mmp_show_lk') === '1' ): ?>
                    <a href="<?php echo esc_url(get_option('mmp_lkin_page')) ?>"><img class="w3-image mm-img-social" src="<?php echo wpmmp_image_url('linkedin.png') ?>"></a>
                    <?php endif; ?>
                    </span>

                </div>
            </div>
            
        </div>
        <?php do_action('wpmmp_footer'); ?>
        <style>
            body {
            background: #f8f8f8 url(/img/pattern.jpg);
            }
            .mm-btn {
                color: <?php echo esc_attr_e( get_option('mmp_text_color') ) ?> !important;
            }
            </style>
    </body>

</html>

