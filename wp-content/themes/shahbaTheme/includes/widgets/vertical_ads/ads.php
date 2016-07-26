<?php
add_action('widgets_init', 'shahba_single_ad_load_widgets');

function shahba_single_ad_load_widgets()
{
	register_widget('shahba_single_ad_Widget');
}

class shahba_single_ad_Widget extends WP_Widget {

	function __construct()
	{
		$widget_ops = array('classname' => 'shahba_ad', 'description' => 'Add ads.');

		$control_ops = array('id_base' => 'shahba_single_ads-widget');

		$this->WP_Widget('shahba_single_ads-widget', 'SHAHBA - Single ad', $widget_ops, $control_ops);
	}

	function widget($args, $instance)
	{
		extract($args);

		?>
		<?php echo $before_widget; ?>
			<?php echo $before_title; ?>
				<?php echo $instance['title'] ?>
			<?php echo $after_title; ?>
		<div class="widget_adds">
			<div class="row row_2">
				<?php
				if($instance['ad_img'] && $instance['ad_link']):
				?>
				<div class="col-sm-12">
					<span>
						<a href="<?php echo $instance['ad_link']; ?>">
							<img src="<?php echo $instance['ad_img']; ?>" alt="" />
						</a>
					</span>
				</div>
				<?php endif;?>
			</div>
		</div>
		<?php echo $after_widget; ?>
		<?php
	}
	function form($instance)
	{
		$defaults = array();
		$instance = wp_parse_args((array) $instance, $defaults);
		if(!@$instance['title']) $instance['title'] = 'Ads';
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo @$instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_img'); ?>">Image Ad Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('ad_img'); ?>" name="<?php echo $this->get_field_name('ad_img'); ?>" value="<?php echo @$instance['ad_img']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_link'); ?>">Ad Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('ad_link'); ?>" name="<?php echo $this->get_field_name('ad_link'); ?>" value="<?php echo @$instance['ad_link']; ?>" />
		</p>
	<?php
	}
}