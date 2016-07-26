<?php
add_action('widgets_init', 'shahba_ad_load_widgets');

function shahba_ad_load_widgets()
{
	register_widget('shahba_Ad_Widget');
}

class shahba_Ad_Widget extends WP_Widget {

	function __construct()
	{
		$widget_ops = array('classname' => 'shahba_ad', 'description' => 'Add ads.');

		$control_ops = array('id_base' => 'shahba_ad-widget');

		$this->WP_Widget('shahba_ad-widget', 'SHAHBA - Ads', $widget_ops, $control_ops);
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
				$ads = array(1, 2, 3, 4);
				foreach($ads as $ad_count):
					if($instance['ad_125_img_'.$ad_count] && $instance['ad_125_link_'.$ad_count]):
				?>
				<div class="col-md-6 col-sm-3 col-xs-6 col-lx-12">
					<span>
						<a href="<?php echo $instance['ad_125_link_'.$ad_count]; ?>">
							<img src="<?php echo $instance['ad_125_img_'.$ad_count]; ?>" alt="" />
						</a>
					</span>
				</div>
				<?php endif; endforeach; ?>
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
		<p><strong>Ad 1</strong></p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_img_1'); ?>">Image Ad Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('ad_125_img_1'); ?>" name="<?php echo $this->get_field_name('ad_125_img_1'); ?>" value="<?php echo @$instance['ad_125_img_1']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_link_1'); ?>">Ad Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('ad_125_link_1'); ?>" name="<?php echo $this->get_field_name('ad_125_link_1'); ?>" value="<?php echo @$instance['ad_125_link_1']; ?>" />
		</p>
		<p><strong>Ad 2</strong></p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_img_2'); ?>">Image Ad Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('ad_125_img_2'); ?>" name="<?php echo $this->get_field_name('ad_125_img_2'); ?>" value="<?php echo @$instance['ad_125_img_2']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_link_2'); ?>">Ad Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('ad_125_link_2'); ?>" name="<?php echo $this->get_field_name('ad_125_link_2'); ?>" value="<?php echo @$instance['ad_125_link_2']; ?>" />
		</p>
		<p><strong>Ad 3</strong></p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_img_3'); ?>">Image Ad Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('ad_125_img_3'); ?>" name="<?php echo $this->get_field_name('ad_125_img_3'); ?>" value="<?php echo @$instance['ad_125_img_3']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_link_3'); ?>">Ad Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('ad_125_link_3'); ?>" name="<?php echo $this->get_field_name('ad_125_link_3'); ?>" value="<?php echo @$instance['ad_125_link_3']; ?>" />
		</p>
		<p><strong>Ad 4</strong></p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_img_4'); ?>">Image Ad Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('ad_125_img_4'); ?>" name="<?php echo $this->get_field_name('ad_125_img_4'); ?>" value="<?php echo @$instance['ad_125_img_4']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_link_4'); ?>">Ad Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('ad_125_link_4'); ?>" name="<?php echo $this->get_field_name('ad_125_link_4'); ?>" value="<?php echo @$instance['ad_125_link_4']; ?>" />
		</p>
	<?php
	}
}