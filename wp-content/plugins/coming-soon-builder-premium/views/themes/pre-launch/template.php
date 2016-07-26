<!DOCTYPE html>
<html>
<head>


	<?php if ( get_option('mmp_seo_meta') !== '' ): ?>
    <meta name="description" content="<?php esc_attr_e(get_option('mmp_seo_meta')) ?>" />
    <?php endif; ?>

    <?php if ( get_option('mmp_favicon') !== '' ): ?>
    <link rel="icon" type="image/png" href="<?php echo esc_url(get_option('mmp_favicon')) ?>">
    <?php endif; ?>

    <title><?php esc_html_e(get_option('mmp_title')) ?></title>


    <link href="<?php echo plugins_url( 'css/normalize.css' , __FILE__ ) ?>" rel="stylesheet">
    <link href="<?php echo plugins_url( 'css/skeleton.css' , __FILE__ ) ?>" rel="stylesheet">

    <?php wp_print_scripts( array( 'jquery' ) ) ?>
	
	<script src="<?php echo plugins_url( 'js/countdown.js' , __FILE__ ) ?>"></script>

	 <?php do_action( 'wpmmp_head' ) ?>
</head>

<body>

    <div class="section hero">
    <div class="container">
      <div class="row">
        <div class="one-half column">
        <?php if ( get_option('mmp_logo') !== '' ): ?>
          <div>
            <img id="logo" src="<?php echo esc_url(get_option('mmp_logo')) ?>" />
          </div>
        <?php endif; ?>
          <h4 class="hero-heading"><?php esc_html_e(get_option('mmp_headline')) ?></h4>
          <p class="hero-subheading"><?php esc_html_e(get_option('mmp_subheading')) ?></p>
          <div>
          <?php $this->add_email_form(false) ?>
          </div>

          <div class="mm-social-icons">
    <?php $this->add_social_icons() ?>
    </div>
        </div>
        <div class="one-half column phones">
          <?php echo  $this->_content( get_option('mmp_message') )  ?>
        </div>
      </div>
    </div>
  </div>
    <script type="text/javascript">
        jQuery(function ($) {
            $('#c-heading').countdown('<?php echo $cd_date ?>', function(event) {
                $(this).html(event.strftime(''
                    +'<table class=" w3-center mm-c-table">'
                            +'<tr class="mm-counters">'
                                +'<td><div class="days-div">%D</div></td> <td><div class="days-div">%H</div></td> <td><div class="days-div">%M</div></td> <td><div class="days-div">%S</div></td>'
                            +'</tr>'
                            +'<tr class="day-s">'
                                +'<td>DAYS</td> <td>HOURS</td> <td>MINUTES</td> <td>SECONDS</td>'
                            +'</tr></table>'
                            
                            ));
            });

        });
    
    </script>
    <?php do_action( 'wpmmp_footer' ) ?>
</body>

</html>