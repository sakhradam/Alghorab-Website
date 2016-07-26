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

<div id="sec-1" class='w3-col m8 s12 mmp_section w3-center'>

<div id="mm-content" class="w3-center">
	
	<h1><?php esc_html_e(get_option('mmp_headline')) ?></h1>
	<div class="content-message"><?php echo  $this->_content( get_option('mmp_message') )  ?></div>
	<div class='w3-col mmp_section'>
		<div id="m-counter" class="w3-col">
		<div id='c-heading' class=""></div>
	</div>
	<div class="w3-col mm-span-social">
	<?php $this->add_email_form(false) ?>
	</div>
	</div>
</div>
	
</div>
	<div id="sec-1" class='w3-col m7 s12 mmp_section w3-right'>
		
		<img id="mm-image" class="align-right w3-image" src="<?php echo plugins_url( 'img/pc-worker-maintenance-wid-eyes.png' , __FILE__ ) ?>">
	</div>
	</div>
<div class="mm-social-icons">
<?php $this->add_social_icons() ?>
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