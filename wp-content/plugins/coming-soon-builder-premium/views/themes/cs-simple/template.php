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

    <link href="<?php echo plugins_url( 'w3.css' , __FILE__ ) ?>" rel="stylesheet">

    <?php wp_print_scripts( array( 'jquery' ) ) ?>
	
	<script src="<?php echo plugins_url( 'js/countdown.js' , __FILE__ ) ?>"></script>

	 <?php do_action( 'wpmmp_head' ) ?>
</head>
<body>
	<div id='m-container' class="w3-row w3-card-8">
	<div id='header' class="w3-col s12 w3-center">
	<?php if ( get_option('mmp_logo') === '' ): ?>
	<img  id="logo" src="http://flaticons.net/icons/Food/Beverage-Coffee-01.png" class="w3-image" >
	<?php else: ?>
	<img id="logo" src="<?php echo esc_url(get_option('mmp_logo')) ?>" />
	<?php endif; ?>
	<h1 class="w3-center w3-xxxlarge"><?php esc_html_e(get_option('mmp_headline')) ?></h1>
	<div class="w3-center content-message"><?php echo  $this->_content( get_option('mmp_message') )  ?></div>
	</div>
	<div id="m-content" class="w3-col s12">
		
	</div>
	<?php if ( get_option('mmp_on_off_countdown') === '1' ): ?>
    <?php if ( defined( 'WPMMP_PRO_VERSION_ENABLED' ) ): ?>
    <div id="m-counter" class="w3-col s12">
		<div id='c-heading' class="w3-center"></div>
	</div>
    <?php endif; ?>
    <?php endif; ?>
	
	<div class="w3-col s12 w3-center mm-span-social">
	<?php $this->add_email_form() ?>
	<?php $this->add_social_icons() ?>
	</div>
<!-- </div> -->

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
	<style>
	<?php if ( get_option('mmp_bgcolor') !== '' ): ?>
	#m-container {
		background: <?php esc_attr_e( get_option('mmp_bgcolor') ) ?> ;
		opacity: 0.7;
	}
	<?php endif; ?>
	</style>
</body>
</html>