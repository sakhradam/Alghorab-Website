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
<div id='m-container' class="w3-row w3-center">
	<div id="sec-1" class='w3-col s12 mmp_section'>
		<?php if ( get_option('mmp_logo') === '' ): ?>
		<img  id="logo" src="http://flaticons.net/icons/Food/Beverage-Coffee-01.png" class="w3-image" >
		<?php else: ?>
		<img id="logo" src="<?php echo esc_url(get_option('mmp_logo')) ?>" />
		<?php endif; ?>
		<h1><?php esc_html_e(get_option('mmp_headline')) ?></h1>
		<div class="w3-center content-message"><?php echo  $this->_content( get_option('mmp_message') )  ?></div>
	</div>
	<?php if ( get_option('mmp_on_off_countdown') === '1' ): ?>
	<div id="sec-2" class='w3-col s12 mmp_section'>
		<div id="m-counter" class="w3-col s12">
		<div id='c-heading' class="w3-center"></div>
	</div>
	<?php endif; ?>
	<div class="w3-col s12 w3-center mm-span-social">
	<?php $this->add_email_form() ?>
	<?php $this->add_social_icons() ?>
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
	<style>
	<?php if ( get_option('mmp_bgcolor') !== '' ): ?>
	#sec-2 {
		background: <?php esc_attr_e( get_option('mmp_bgcolor') ) ?> ;
	}
	<?php endif; ?>

	<?php if ( get_option('mmp_text_color') !== '' ): ?>
	#sec-1 > h1, #sec-1 > h3 {
		color: <?php esc_attr_e( get_option('mmp_text_color') ) ?> ;
	}
	<?php endif; ?>
	<?php if ( get_option('mmp_background_image') !== '' ): ?>
		body {
		    background: none;
		}
		#sec-1 {
			background: url( "<?php echo esc_url(get_option('mmp_background_image')) ?>" ) no-repeat center center fixed;
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
		    background-size: cover;
		}
	<?php endif; ?>
	</style>
</body>
</html>