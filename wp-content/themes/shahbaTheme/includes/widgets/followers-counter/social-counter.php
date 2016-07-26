<?php

class shahbaFollowerCounterWidget extends WP_Widget
{
    public $version = '';
	/**
	* Declares the shahbaFollowerCounterWidget class.
	*
	*/
	function shahbaFollowerCounterWidget(){
		add_action('wp_enqueue_scripts', array(&$this, 'scEnqueueStyles'));
		$widget_ops = array('classname' => 'widget_FollowerCounter', 'description' => __( "") );
		$this->WP_Widget('FollowerCounter', __('SHAHBA - Social Media Followers'), $widget_ops);
	}

	/**
	* Displays the Widget
	*
	*/
	function widget($args, $instance){
		global $data;

        extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);

        global $shahbaConfig;
        $facebook = $shahbaConfig['facebook_acc'];
		$gplus = $shahbaConfig['google_acc'];
		$yt = $shahbaConfig['yoututbe_acc'];
		$instagram = $shahbaConfig['instagram_usertitle'];
		/*for twitter*/
		$twitter_id = $shahbaConfig['twitter_acc'];
		$consumer_key = $shahbaConfig['twitter_api_consumer_key'];
		$consumer_secret = $shahbaConfig['twitter_api_consumer_secret'];
		$access_token = $shahbaConfig['twitter_api_access_key'];
		$access_token_secret = $shahbaConfig['twitter_api_access_secret'];

		include 'template.php';
	}



	/**
	* Creates the edit form for the widget.
	*
	*/
	function form($instance){

		$instance = wp_parse_args( (array) $instance, array('title'=>'') );

		$title = htmlspecialchars($instance['title']);

		echo '<p><label for="' . $this->get_field_name('title') . '">' . __('Title:') . ' <input style="width: 220px;" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></label></p>';

	} //end of form

	/**
	* Saves the widgets settings.
	*
	*/
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));

		$instance['facebook_page_url'] = strip_tags(stripslashes($new_instance['facebook_page_url']));
		$instance['twitter_id'] = strip_tags(stripslashes($new_instance['twitter_id']));
		$instance['gplus_id'] = strip_tags(stripslashes($new_instance['gplus_id']));
		$instance['yt_id'] = strip_tags(stripslashes($new_instance['yt_id']));

		$instance['facebook_text'] = strip_tags(stripslashes($new_instance['facebook_text']));
		$instance['twitter_text'] = strip_tags(stripslashes($new_instance['twitter_text']));
		$instance['gplus_text'] = strip_tags(stripslashes($new_instance['gplus_text']));
		$instance['yt_text'] = strip_tags(stripslashes($new_instance['yt_text']));

		$instance['consumer_key'] = $new_instance['consumer_key'];
		$instance['consumer_secret'] = $new_instance['consumer_secret'];
		$instance['access_token'] = $new_instance['access_token'];
		$instance['access_token_secret'] = $new_instance['access_token_secret'];
		$instance['twitter_id'] = $new_instance['twitter_id'];
		delete_transient( 'shahba_counters' );
		return $instance;
	}

		public function scEnqueueStyles()
		{

		}

	}// END class

	/**
	* Register  widget.
	*
	* Calls 'widgets_init' action after widget has been registered.
	*/
	function shahbaFollowerCounterInit() {
		register_widget('shahbaFollowerCounterWidget');
	}
	add_action('widgets_init', 'shahbaFollowerCounterInit');


class shahbaFllowersCountFunc{

	static function facebook_like_count(){
		global $shahbaConfig;
        $page_link = $shahbaConfig['facebook_acc'];

	    if(!$page_link)
	    	return false;

		$url = str_replace('https://www.facebook.com/', '', $page_link);

		$curl_url = 'https://graph.facebook.com/' . $url;
		try{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $curl_url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$result = curl_exec($ch);
			$results = json_decode($result, true);
			curl_close($ch);

			if(!is_array($results))
				return 0;
			if(array_key_exists( 'error', $results)){
				$flc_message = 'Error - '.$results['error']['message'];
				return $flc_message;
			} else {
				$flc_message = 'Like count updated';
				return (int)$results['likes'];
			}
		}
		catch( Exception $e){
			$flc_message = $e->getMessage();
		}
	}
	static function instagram_count(){
		global $shahbaConfig;
		$user_id = $shahbaConfig['instagram_user_id'];
		$access_token = $shahbaConfig['instagram_access_token'];

	    if(! ($user_id and $access_token) )
	    	return false;

		$url = "https://api.instagram.com/v1/users/$user_id?access_token=$access_token";
		$remote_data = wp_remote_get($url);
		if(is_object($remote_data) and get_class($remote_data)=='WP_Error')
			return 0;
		$json_data = json_decode( $remote_data['body'], true );
		return $json_data['data']['counts']['followed_by'];
	}
	static function tweet_count( ){
		global $shahbaConfig;
		$twitter_id = $shahbaConfig['twitter_acc'];
        $twitter_id = str_replace('http://', '', $twitter_id);
        $twitter_id = str_replace('https://', '', $twitter_id);
        $twitter_id = str_replace('twitter.com/', '', $twitter_id);
		$consumer_key = $shahbaConfig['twitter_api_consumer_key'];
		$consumer_secret = $shahbaConfig['twitter_api_consumer_secret'];
		$access_token = $shahbaConfig['twitter_api_access_key'];
		$access_token_secret = $shahbaConfig['twitter_api_access_secret'];
		if($twitter_id && $consumer_key && $consumer_secret && $access_token && $access_token_secret) {
		     // require the twitter auth class
		     require_once 'twitteroauth/twitteroauth.php';
		     $twitterConnection = new shahbaTwitterOAuth(
							$consumer_key,	// Consumer Key
							$consumer_secret,   	// Consumer secret
							$access_token,       // Access token
							$access_token_secret    	// Access token secret
							);
		    $twitter = $twitterConnection->get(
							  'statuses/user_timeline',
							  array(
							    'screen_name'     => $twitter_id,
							    //'count'           => $count,
							    'exclude_replies' => false
							  )
							);

			if($twitter && is_array($twitter)) {
				$count = $twitter[0]->user->followers_count;
				return $count;
			}
		} else {
			return false;
		}
	}
	static function google_plus_count()
	{
		global $shahbaConfig;
        $id = $shahbaConfig['google_acc'];

	    if(! ($id) )
	    	return false;
		$link = $id;

		$gplus = array(
                'method'    => 'POST',
                'sslverify' => false,
                'timeout'   => 30,
                'headers'   => array( 'Content-Type' => 'application/json' ),
                'body'      => '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $link . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]'
            );

	    $remote_data = wp_remote_get( 'https://clients6.google.com/rpc', $gplus );

		if(is_object($remote_data) and get_class($remote_data)=='WP_Error')
			return 0;

	    $json_data = json_decode( $remote_data['body'], true );
		$gresult = '';
	    foreach($json_data[0]['result']['metadata']['globalCounts'] as $gcount){
	        $gresult .= $gcount;
	    }
        if( 0 != $gcount){

        	return $gcount;
        } else {
			$page = file_get_contents($link);
			if (preg_match('/>([0-9,]+) people</i', $page, $matches)) {
				return str_replace(',', '', $matches[1]);
			}
    	}
	}

	static function get_yt_subs() {
		global $shahbaConfig;
        $uname = $shahbaConfig['yoututbe_acc'];
        if(!$uname) return false;
        $uname = str_replace('www.', '', $uname);
        $uname = str_replace('http://', '', $uname);
        $uname = str_replace('https://', '', $uname);
        $uname = str_replace('youtube.com/', '', $uname);
        $uname = str_replace('user/', '', $uname);

		$api_url = 'http://gdata.youtube.com/feeds/api/users/';
		$id = 'youtube';

		if ( 1 ) {
			$params = array(
				'sslverify' => false,
				'timeout'   => 1
			);

			$connection = wp_remote_get( $api_url . $uname, $params );

			if(is_object($connection) and get_class($connection)=='WP_Error')
				return 0;

			if ( is_wp_error( $connection ) || '400' <= $connection['response']['code'] ) {
				$total = ( isset( $cache[ $id ] ) ) ? $cache[ $id ] : 0;
			} else {
				try {
					$body  = str_replace( 'yt:', '', $connection['body'] );
					$xml   = @new SimpleXmlElement( $body, LIBXML_NOCDATA );
					$count = intval( $xml->statistics['subscriberCount'] );

					$total = $count;
				} catch ( Exception $e ) {
					$total = ( isset( $cache[ $id ] ) ) ? $cache[ $id ] : 0;
				}
			}
		}
		return $total;
	}
}
	 function shahba_get_followers_counters(){
		$counters = get_transient( 'shahba_counters' );
		if (false === $counters ) {
		 	$counters = array(
		 		'facebook'    => shahbaFllowersCountFunc::facebook_like_count(),
		 		'twitter'     => shahbaFllowersCountFunc::tweet_count(),
		 		'google_plus' => shahbaFllowersCountFunc::google_plus_count(),
		 		'youtube'     => shahbaFllowersCountFunc::get_yt_subs(),
		 		'instagram'   => shahbaFllowersCountFunc::instagram_count(),
		 		'posts'       => wp_count_posts()->publish,
		 	);
			$r = set_transient( 'shahba_counters', $counters, 3600);
		}
		return $counters;
	}