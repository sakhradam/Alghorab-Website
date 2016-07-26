<form action="" method="POST">
<div id="poststuff">

<table class="wpmmp_input widefat" id="wpmmp_options">

	<tbody>

		<tr id="page-logo">
			
			<td class="label">
				<label>
					<?php _e( 'Logo', 'wpmmp' ); ?>
				</label>
				<p class="description">add image code to show an image based logo</p>
			</td>
			<td>
				<input type="text" name="settings[logo]" value="<?php echo $settings['alissa']['logo'] ?>" />
			</td>
			
		</tr>

		<tr id="header-tagline">
			
			<td class="label">
				<label>
					<?php _e( 'Header tagline', 'wpmp' ); ?>
				</label>
				<p class="description"><?php _e( 'Tel/email etc', 'wpmmp') ?></p>
			</td>
			<td>
				<input type="text" name="settings[header_tagline]" value="<?php echo $settings['alissa']['header_tagline'] ?>" />
			</td>
			
		</tr>

		<tr id="subscribe_form">
			
			<td class="label">
				<label>
					<?php _e( 'Enable Subscribe Form', 'wpmp' ); ?>
				</label>
				<p class="description"><?php _e( 'Uncheck to disable or hide', 'wpmmp') ?></p>
			</td>
			<td>
				<input type="checkbox" name="settings[subscribe_form]" <?php checked( $settings['alissa']['subscribe_form'], true ) ?> />
			</td>
			
		</tr>

		<tr id="form-heading">
			
			<td class="label">
				<label>
					<?php _e( 'Form heading', 'wpmmp' ); ?>
				</label>
				<p class="description"></p>
			</td>
			<td>
				<input type="text" name="settings[form_heading]" value="<?php echo $settings['alissa']['form_heading'] ?>" />
			</td>
			
		</tr>

		<tr id="form-sub-heading">
			
			<td class="label">
				<label>
					<?php _e( 'Form sub-heading', 'wpmmp' ); ?>
				</label>
				<p class="description"></p>
			</td>
			<td>
				<input type="text" name="settings[form_sub_heading]" value="<?php echo $settings['alissa']['form_sub_heading'] ?>" />
			</td>
			
		</tr>

		<tr id="form-field-text">
			
			<td class="label">
				<label>
					<?php _e( 'Form field text', 'wpmmp' ); ?>
				</label>
				<p class="description"></p>
			</td>
			<td>
				<input type="text" name="settings[form_field_text]" value="<?php echo $settings['alissa']['form_field_text'] ?>" />
			</td>
			
		</tr>

		<tr id="form-btn-text">
			
			<td class="label">
				<label>
					<?php _e( 'Form button text', 'wpmmp' ); ?>
				</label>
				<p class="description"></p>
			</td>
			<td>
				<input type="text" name="settings[form_btn_text]" value="<?php echo $settings['alissa']['form_btn_text'] ?>" />
			</td>
			
		</tr>

		<tr id="mailchimp-api">
			
			<td class="label">
				<label>
					<?php _e( 'Mailchimp API key', 'wpmmp' ); ?>
				</label>
				<p class="description"><a href="http://3by400.com/index.php/mailchimp-faqs/197-mailchimp-api-key-list-id-mailchimp-api-key-list-id" target="_blank"><?php _e( 'Where do I find the API key and list ID?', 'wpmmp' ) ?></a></p>
			</td>
			<td>
				<input type="text" name="settings[mailchimp_api]" value="<?php echo $settings['alissa']['mailchimp_api'] ?>" />
			</td>
			
		</tr>

		<tr id="mailchimp-api">
			
			<td class="label">
				<label>
					<?php _e( 'Mailchimp list id', 'wpmmp' ); ?>
				</label>
				<p class="description"></p>
			</td>
			<td>
				<input type="text" name="settings[mailchimp_list]" value="<?php echo $settings['alissa']['mailchimp_list'] ?>" />
			</td>
			
		</tr>

		<tr id="btn-fb">
			
			<td class="label">
				<label>
					<?php _e( 'Facebook', 'wpmmp' ); ?>
				</label>
				<p class="description"><?php _e( 'To hide the button leave field empty', 'wpmmp' ) ?></p>
			</td>
			<td>
				<input type="text" name="settings[btn_fb]" value="<?php echo $settings['alissa']['btn_fb'] ?>" />
			</td>
			
		</tr>

		<tr id="btn-twitter">
			
			<td class="label">
				<label>
					<?php _e( 'Twitter', 'wpmmp' ); ?>
				</label>
				<p class="description"><?php _e( 'To hide the button leave field empty', 'wpmmp' ) ?></p>
			</td>
			<td>
				<input type="text" name="settings[btn_twitter]" value="<?php echo $settings['alissa']['btn_twitter'] ?>" />
			</td>
			
		</tr>

		<tr id="btn-dribble">
			
			<td class="label">
				<label>
					<?php _e( 'Dribble', 'wpmmp' ); ?>
				</label>
				<p class="description"><?php _e( 'To hide the button leave field empty', 'wpmmp' ) ?></p>
			</td>
			<td>
				<input type="text" name="settings[btn_dribble]" value="<?php echo $settings['alissa']['btn_dribble'] ?>" />
			</td>
			
		</tr>

		<tr id="btn-gplus">
			
			<td class="label">
				<label>
					<?php _e( 'Google+', 'wpmmp' ); ?>
				</label>
				<p class="description"><?php _e( 'To hide the button leave field empty', 'wpmmp' ) ?></p>
			</td>
			<td>
				<input type="text" name="settings[btn_gplus]" value="<?php echo $settings['alissa']['btn_gplus'] ?>" />
			</td>
			
		</tr>

		<tr id="btn-pin">
			
			<td class="label">
				<label>
					<?php _e( 'Pinterest', 'wpmmp' ); ?>
				</label>
				<p class="description"><?php _e( 'To hide the button leave field empty', 'wpmmp' ) ?></p>
			</td>
			<td>
				<input type="text" name="settings[btn_pin]" value="<?php echo $settings['alissa']['btn_pin'] ?>" />
			</td>
			
		</tr>

		<tr id="btn-flickr">
			
			<td class="label">
				<label>
					<?php _e( 'Flickr', 'wpmmp' ); ?>
				</label>
				<p class="description"><?php _e( 'To hide the button leave field empty', 'wpmmp' ) ?></p>
			</td>
			<td>
				<input type="text" name="settings[btn_flickr]" value="<?php echo $settings['alissa']['btn_flickr'] ?>" />
			</td>
			
		</tr>

		<tr id="bg-1">
			
			<td class="label">
				<label>
					<?php _e( 'Background image #1', 'wpmmp' ); ?>
				</label>
				<p class="description"><?php _e( 'Enter valid image url', 'wpmmp' ) ?></p>
			</td>
			<td>
				<input type="text" name="settings[bg_1]" value="<?php echo $settings['alissa']['bg_1'] ?>" />
			</td>
			
		</tr>

		<tr id="bg-1">
			
			<td class="label">
				<label>
					<?php _e( 'Background image #2', 'wpmmp' ); ?>
				</label>
				<p class="description"><?php _e( 'Enter valid image url', 'wpmmp' ) ?></p>
			</td>
			<td>
				<input type="text" name="settings[bg_2]" value="<?php echo $settings['alissa']['bg_2'] ?>" />
			</td>
			
		</tr>

		<tr id="bg-1">
			
			<td class="label">
				<label>
					<?php _e( 'Background image #3', 'wpmmp' ); ?>
				</label>
				<p class="description"><?php _e( 'Enter valid image url', 'wpmmp' ) ?></p>
			</td>
			<td>
				<input type="text" name="settings[bg_3]" value="<?php echo $settings['alissa']['bg_3'] ?>" />
			</td>
			
		</tr>




		<?php do_action( 'wpmmp_advanced_settings' ) ?>

	</tbody>
</table>

</div>
<div id="wpmmp-buttons" style="margin-top: 25px;">
	<?php submit_button( __( 'Save Settings', 'wpmp' ), 'primary large', 'submit', false ) ?>
</div>
<input type="hidden" name="nonce" value="<?php echo $nonce ?>" />
</form>