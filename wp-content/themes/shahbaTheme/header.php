
<?php global $shahbaConfig; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
    <head>
        <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
        <?php wp_head() ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <?php get_template_part( 'templates/style' ); ?>
    </head>
    <body <?php body_class(); ?> >
        <header id="header">
            <?php if($shahbaConfig['show_top_header']){?>
            <div class="top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7">
                        <?php if( shahbaHelper::get_option( 'show_top_menue' , false ) ){?>
                            <div class="navbar navbar-static-top bs-docs-nav" id="bar_menue" role="banner">
                                <div class="top_navbar">
                                    <div class="navbar-header">
                                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-topnavbar-collapse">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <?php wp_nav_menu(array(
                                        'theme_location' => 'top_menue',
                                        'container'         => 'nav',
                                        'container_class' => 'collapse navbar-collapse bs-topnavbar-collapse',
                                        'items_wrap' => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>',
                                        'fallback_cb'       => 'BS3_Walker_Nav_Menu::fallback',
                                        'walker' => new BS3_Walker_Nav_Menu,
                                        'depth'           => 1,
                                    )); ?>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="search">
                                <form method="get" action="<?php bloginfo( 'url' ); ?>" >
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                        <input name="s" type="text" class="form-control" placeholder="<?php _e('Search',TEMPLATE_DMN) ?>..."/>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                        </div>
                        <div class="col-sm-5">
                            <div class="social">
                                <ul class="row">
                                    <?php if($shahbaConfig['facebook_acc']) { ?>
                                    <li>
                                        <a href="<?php echo $shahbaConfig['facebook_acc'] ?>"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <?php } if($shahbaConfig['vimeo_acc']) { ?>
                                    <li>
                                        <a href="<?php echo $shahbaConfig['vimeo_acc'] ?>"><i class="fa fa-vine"></i></a>
                                    </li>
                                    <?php } if($shahbaConfig['twitter_acc']) { ?>
                                    <li>
                                        <a href="<?php echo $shahbaConfig['twitter_acc'] ?>"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <?php } if($shahbaConfig['yoututbe_acc']) { ?>
                                    <li>
                                        <a href="<?php echo $shahbaConfig['yoututbe_acc'] ?>"><i class="fa fa-youtube"></i></a>
                                    </li>
                                    <?php } if($shahbaConfig['instagram_usertitle']) { ?>
                                    <li>
                                        <a href="<?php echo $shahbaConfig['instagram_usertitle'] ?>"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <?php } if($shahbaConfig['google_acc']) { ?>
                                    <li>
                                        <a href="<?php echo $shahbaConfig['google_acc'] ?>"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <?php } ?>
                                    <li>
                                        <a href="<?php echo bloginfo( 'rss2_url' ); ?>"><i class="fa fa-rss"></i></a>
                                    </li>
                                </ul>
                              </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </div> <!-- end top header -->
            <?php }?>
            <div class="logo_wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo">
                                <a href="<?php bloginfo( 'url' ); ?>">
                                    <img src="<?php echo $shahbaConfig['logo']['url'] ?>">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="header_add">
                                <?php echo $shahbaConfig['header_banner'] ?>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </div> <!-- end logo-wrap header -->
            <div class="menu_section">
                <div class="navbar navbar-static-top bs-docs-nav main_border_color container" id="top" role="banner">
                    <div class="top_navbar">
                        <div class="navbar-header">
                            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container'         => 'nav',
                            'container_class' => 'collapse navbar-collapse bs-navbar-collapse',
                            'items_wrap' => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>',
                            'fallback_cb'       => 'BS3_Walker_Nav_Menu::fallback',
                            'walker' => new BS3_Walker_Nav_Menu,
                        )); ?>
                    </div>
                </div>
            </div> <!-- end menu_section header-->
        </header>