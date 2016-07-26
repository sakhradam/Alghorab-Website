<?php

add_action("redux/options/pt_option/saved", 'write_file');

function write_file(){
    file_put_contents('filename_shahba3.txt', 'data');
}

if (!class_exists('shahba_options_config')) {

    class shahba_options_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }
        }
        public function initSettings() {

            // Set the default arguments
            $this->setArguments();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            add_action('redux/options/' . $this->args['opt_name'] . '/validate',  array( __CLASS__, "on_redux_save" ) );

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        public static function on_redux_save( $values ) {
            delete_transient( 'shahba_counters' );
            if(function_exists('wp_cache_clear_cache')){
                wp_cache_clear_cache();
            }
        }

        public function setSections() {
            global $wp_roles;
            $WPLANG = strtolower(get_locale());
            $roles = $wp_roles->get_names();
            $fonts = array(
                'Custom font'=>'Custom font',
                'JF_Flat'=>'JF_Flat',
                'AraJozoor-Regular'=>'AraJozoor-Regular',
                'OpenSans-Light'=>'OpenSans-Light',
                'OpenSans_Bold'=>'OpenSans_Bold',
                'RobotoSlab'=>'RobotoSlab',
                'DroidSans'=>'DroidSans',
                'DroidSansArabic'=>'DroidSansArabic',
                'GE_SS_Text_Light'=>'GE_SS_Text_Light',
                'GE_SS_Text_Medium'=>'GE_SS_Text_Medium',
                'GE_SS_Text_UltraLight'=>'GE_SS_Text_UltraLight',
                'GE_SS_Two_Light'=>'GE_SS_Two_Light',
                'GE_SS_Two_Medium'=>'GE_SS_Two_Medium',
            );
            // ACTUAL DECLARATION OF SECTIONS
            $this->sections[] = array(
                'title'     => __('General Settings',TEMPLATE_DMN),
                'desc'      => '',
                'icon'      => 'el-icon-cogs',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    array(
                        'id'       => 'body_bg',
                        'type'     => 'background',
                        'title'    => __('Main Background', TEMPLATE_DMN),
                        'subtitle' =>  '',
                        'desc'     => '',
                        'default'  => array(
                            'background-color' => '#e0e0e0',
                        )
                    ),
                    array(
                        'id'       => 'main_color',
                        'type'     => 'color',
                        'title'    => __('Main Color', TEMPLATE_DMN),
                        'subtitle' => '',
                        'default'  => '#D84833',
                        'validate' => 'color',
                    ),
                    array(
                        'id'       => 'links_color',
                        'type'     => 'link_color',
                        'title'    => __('Links Color', TEMPLATE_DMN),
                        'subtitle' => '',
                        'desc'     =>  '',
                        'default'  => array(
                            'regular'  => '#333',
                            'hover'    =>  '#D84833',
                            'active'   =>  '#D84833',
                            'visited'  =>  '#D84833',
                        )
                    ),
                    array(
                        'id'          => 'body_font',
                        'type'        => 'typography',
                        'fonts'       => $fonts,
                        'title'       => __('Main font', TEMPLATE_DMN),
                        'google'      => true,
                        'font-backup' => true,
                        'output'      => array('h2.site-description'),
                        'units'       =>'px',
                        'subtitle'    =>  '',
                        'default'     => array(
                            'color'       => '#363636',
                            'font-weight'  => '100',
                            'font-family' => ($WPLANG=='ar')?'JF_Flat':'Helvetica',
                            'google'      => true,
                            'font-size'   => '14px',
                            'line-height' => 'auto'
                        ),
                    ),
                    array(
                        'id'       => 'section_bg',
                        'type'     => 'color_rgba',
                        'title'    => __('Block background', TEMPLATE_DMN),
                        'subtitle' =>  '',
                        'desc'     =>  '',
                        'default'  => array(
                            'color' => '#fff',
                            'alpha' => '1.0'
                        ),
                        'output'   => array('body'),
                        'mode'     => 'background',
                    ),
                    array(
                        'id'       => 'category_able',
                        'type'     => 'switch',
                        'title'    => __('Show categories', TEMPLATE_DMN),
                        'subtitle' =>  '',
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'author_able',
                        'type'     => 'switch',
                        'title'    => __('Show Author', TEMPLATE_DMN),
                        'subtitle' =>  '',
                        'default'  => true,
                    ),
                    array(
                        'id'          => 'title_font',
                        'type'        => 'typography',
                        'fonts'       => $fonts,
                        'title'       => __('Titles font', TEMPLATE_DMN),
                        'google'      => true,
                        'font-backup' => true,
                        'output'      => array('h2.site-description'),
                        'units'       => 'px',
                        'font-size'   => false,
                        'line-height' => false,
                        'text-align'  => false,
                        'subtitle'    =>  '',
                        'default'     => array(
                            'color'       => '#363636',
                            'font-weight'  => '100',
                            'font-family' => ($WPLANG=='ar')?'JF_Flat':'OpenSans-Light',
                        ),
                    ),
                    array(
                        'id'       => 'border_color',
                        'type'     => 'color',
                        'title'    => __('Title bottom line color', TEMPLATE_DMN),
                        'subtitle' =>  '',
                        'desc'     =>  '',
                        'default'  => '#c2c2c2',
                    ),
                    array(
                        'id'       => 'tittle_color',
                        'type'     => 'color',
                        'title'    => __('Title color', TEMPLATE_DMN),
                        'subtitle' =>  '',
                        'desc'     => '',
                        'default'  => '#fff',
                    ),
                    array(
                        'id'       => 'title_bg',
                        'type'     => 'color_rgba',
                        'title'    => __('Article title background', TEMPLATE_DMN),
                        'subtitle' =>  '',
                        'desc'     =>  '',
                        'default'  => array(
                            'color' => '#000',
                            'alpha' => '0.5'
                        ),
                        'output'   => array('body'),
                        'mode'     => 'background',
                    ),
                    array(
                        'id'        => 'alt_img',
                        'type'      => 'media',
                        'url'      => true,
                        'title'     => __('Alternative image', TEMPLATE_DMN),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'default'  => array(
                            'url'=>TEMPLATE_URL.'/img/preview.png'
                        ),
                    ),
                    array(
                        'id'        => 'authers_page_roles',
                        'type'      => 'select',
                        'options'      => $roles,
                        'title'     => __('Authers Page Roles',TEMPLATE_DMN),
                        'subtitle'  => '',
                        'multi'     => true,
                        'desc'      => '',
                        'default'  => array('administrator','editor','author')
                    ),
                    array(
                        'id'        => 'custom_font',
                        'type'      => 'text',
                        'title'     => __('Custom font Url', TEMPLATE_DMN),
                        'desc'      => 'Insert link to font you want to add to the list, We recomende (*.ttf) font type',
                        'subtitle'  => '',
                    ),
                    array(
                        'title'    => __('Show thumbnail in single', TEMPLATE_DMN),
                        'id'       => 'show_thumbnail_in_single',
                        'type'     => 'switch',
                        'subtitle' =>  '',
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'comment_web_input',
                        'type'     => 'switch', 
                        'title'    => __('show website input in add comment form', TEMPLATE_DMN),
                        'default'  => true,
                    ),
                )
            );
            $this->sections[] = array(
                'title'     => __('Home Page',TEMPLATE_DMN),
                'desc'      => '',
                'icon'      => 'el-icon-home',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    array(
                        'id'        => 'slider-category',
                        'type'      => 'select',
                        'data'      => 'categories',
                        'multi'     => true,
                        'title'     => __('Slider Category',TEMPLATE_DMN),
                        'subtitle'  => '',
                        "default"       => get_option('default_category'),
                        'desc'      => '',
                    ),
                    array(     "title"      => __('Slider posts number',TEMPLATE_DMN),
                                "desc"      => "",
                                "id"        => "slider_posts_num",
                                "default"       => "5",
                                "type"      => "text"
                        ),
                    array(
                        'title'    => __('Show slider', TEMPLATE_DMN),
                        'id'       => 'show_slider',
                        'type'     => 'switch',
                        'subtitle' =>  '',
                        'default'  => true,
                    ),
                )
            );
            $this->sections[] = array(
                'title'     => __('Header Settings',TEMPLATE_DMN),
                'desc'      => '',
                'icon'      => 'el-icon-cogs',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    array(
                        'id'       => 'active_menu_color',
                        'type'     => 'color',
                        'title'    =>  __('active menu text color', TEMPLATE_DMN),
                        'default'  => '#FFFFFF',
                        'validate' => 'color',
                    ),
                    array(
                        'id'       => 'show_top_header',
                        'type'     => 'switch',
                        'title'    => __('Show top bar ', TEMPLATE_DMN),
                        'subtitle' =>  '',
                        'default'  => true,
                    ),
                    
                    array(
                        'id'        => 'section_top_header_start',
                        'type'      => 'section',
                        //'title'     => 'Top bar options',
                        //'subtitle'  =>  '',
                        'indent'    => true, // Indent all options below until the next 'section' option is set.
                        'required'  => array('show_top_header', "=", 1),
                    ),
                    array(
                        'id'       => 'top_header_bg',
                        'type'     => 'color_rgba',
                        'title'    => __('Top bar background', TEMPLATE_DMN),
                        'subtitle' =>  '',
                        'desc'     =>  '',
                        'default'  => array(
                            'color' => '#F2F2F2',
                            'alpha' => '1.0'
                        ),
                        'output'   => array('body'),
                        'mode'     => 'background',
                    ),
                    array(
                        'id'       => 'top_header_color',
                        'type'     => 'color',
                        'title'    => __('Top bar text color', TEMPLATE_DMN),
                        'subtitle' =>  '',
                        'desc'     =>  '',
                        'default'  => '#888',
                        'output'   => array('body'),
                        'mode'     => 'background',
                    ),
                    array(
                        'id'        => 'section_top_header_end',
                        'type'      => 'section',
                        'indent'    => false, // Indent all options below until the next 'section' option is set.
                        'required'  => array('show_top_header', "=", 1),
                    ),
                    array(
                        'id'        => 'logo',
                        'type'      => 'media',
                        'title'     => __('Logo', TEMPLATE_DMN),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'      => '',
                        'subtitle'  => '',
                        'default'  => array(
                            'url'=>TEMPLATE_URL.'/img/logo.png'
                        ),
                    ),
                    array(
                        'id'       => 'logo_spacing',
                        'type'     => 'dimensions',
                        'units'    => array('em','px','%'),
                        'title'    => __('Logo Size', TEMPLATE_DMN),
                        'desc'     => '',
                        'default'  => array(
                            'Width'   => 'auto',
                            'Height'  => 'auto',
                            'units'   => 'px',
                        ),
                    ),
                    array(
                        'id'             => 'logo_margin',
                        'type'           => 'spacing',
                        'output'         => array('.site-header'),
                        'mode'           => 'margin',
                        'units'          => array('em', 'px'),
                        'units_extended' => 'false',
                        'title'          => __('Logo Margin', TEMPLATE_DMN),
                        'desc'           => '',
                        'default'            => array(
                            'margin-top'     => '0px',
                            'margin-right'   => '0px',
                            'margin-bottom'  => '0px',
                            'margin-left'    => '0px',
                            'units'          => 'px',
                        )
                    ),
                    array(
                        'id'       => 'navbar_header_bg',
                        'type'     => 'color_rgba',
                        'title'    => __('Navbar background', TEMPLATE_DMN),
                        'subtitle' =>  '',
                        'desc'     =>  '',
                        'default'  => array(
                            'color' => '#242424',
                            'alpha' => '1.0'
                        ),
                        'output'   => array('body'),
                        'mode'     => 'background',
                    ),
                    array(
                        'id'          => 'navbar_typography',
                        'type'        => 'typography',
                        'title'       => __('Navbar font', 'redux-framework-demo'),
                        'google'      => true,
                        'font-backup' => true,
                        'fonts'       => $fonts,
                        'output'      => array('h2.site-description'),
                        'units'       =>'px',
                        'subtitle'    => __('', 'redux-framework-demo'),
                        'default'     => array(
                            'color'       => '#fff',
                            'font-weight'  => '700',
                            'font-family' => ($WPLANG=='ar')?'JF_Flat':'OpenSans_Bold',
                            'google'      => true,
                            'font-size'   => '14px',
                            'line-height' => '20px'
                        ),
                    ),
                    array(
                        'title'    => __('Show top menue', TEMPLATE_DMN),
                        'id'       => 'show_top_menue',
                        'type'     => 'switch',
                        'subtitle' =>  '',
                        'default'  => true,
                    ),
                )
            );
            if( shahbaHelper::check_license() ){
                $rights_options = array(
                    100=>array(
                        'id'        => 'rights_txt',
                        'type'      => 'textarea',
                        'title'     => __('Rights Text',TEMPLATE_DMN),
                        'subtitle'  => '',
                        'desc'      => '',
                        'validate'  => '',
                        'msg'       => '',
                        'default'   => __('',TEMPLATE_DMN),
                    ),
                );
            } else {
                $rights_options = array();
            }

            $this->sections[] = array(
                'title'     => __('Footer',TEMPLATE_DMN),
                'desc'      => '',
                'icon'      => 'el-icon-home',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    array(
                        'id'       => 'footer_bg',
                        'type'     => 'color_rgba',
                        'title'    => __('Footer background', TEMPLATE_DMN),
                        'subtitle' => '',
                        'desc'     => '',
                        'default'  => array(
                            'color' => '#272727',
                            'alpha' => '1.0'
                        ),
                        'output'   => array('body'),
                        'mode'     => 'background',
                    ),
                    array(
                        'id'          => 'footer_title',
                        'type'        => 'typography',
                        'fonts'       => $fonts,
                        'title'       => __('Footer title', TEMPLATE_DMN),
                        'font-backup' => false,
                        'output'      => false,
                        'units'       =>'px',
                        'text-align'  => false,
                        'line-height' => false,
                        'subtitle'    => '',
                        'default'     => array(
                            'color'       => '#fff',
                            'font-size'   => '16px',
                            'font-weight'  => 'normal',
                            'font-family'  => ($WPLANG=='ar')?'JF_Flat':'Open Sans',
                        ),
                    ),
                    array(
                        'id'          => 'footer_text',
                        'type'        => 'typography',
                        'fonts'       => $fonts,
                        'title'       => __('Footer text', TEMPLATE_DMN),
                        'google'      => false,
                        'font-backup' => false,
                        'output'      => false,
                        'units'       =>'px',
                        'font-family' => false,
                        'font-style'  => false,
                        'text-align'  => false,
                        'font-family' => false,
                        'line-height' => false,
                        'subtitle'    => '',
                        'default'     => array(
                            'color'       => '#bfbfbf',
                            'font-size'   => '14px',
                        ),
                    ),
                    array(
                        'id'       => 'footer_rights_bg',
                        'type'     => 'color_rgba',
                        'title'    => __('Rights bar background', TEMPLATE_DMN),
                        'subtitle' => '',
                        'desc'     => '',
                        'default'  => array(
                            'color' => '#1F1F1F',
                            'alpha' => '1.0'
                        ),
                        'output'   => array('body'),
                        'mode'     => 'background',
                    ),
                    array(
                        'id'        => 'footer_txt',
                        'type'      => 'textarea',
                        'title'     => __('Footer Text',TEMPLATE_DMN),
                        'subtitle'  => '',
                        'desc'      => '',
                        'validate'  => '',
                        'msg'       => '',
                        'default'   => __('All rights reserved to their respective owners',TEMPLATE_DMN),
                    ),
                    array(
                        'title'    => __('Show footer widgets', TEMPLATE_DMN),
                        'id'       => 'show_footer_widgets',
                        'type'     => 'switch',
                        'subtitle' =>  '',
                        'default'  => true,
                    ),
                ) + $rights_options
            );
            $this->sections[] = array(
                'title'     => __('Ads',TEMPLATE_DMN),
                'desc'      => '',
                'icon'      => 'el-icon-bullhorn',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    array(
                        "title"      => __('Header banner',TEMPLATE_DMN),
                        "desc"      => "",
                        "id"        => "header_banner",
                        "default"       => '<img src="'.TEMPLATE_URL.'/img/top_banner.png"/>',
                        "type"      => "textarea"
                    ),
                    array(
                        "title"      => __('After header ad 1',TEMPLATE_DMN),
                        "desc"      => "",
                        "id"        => "after_header_ad_1",
                        "default"   => '',
                        "type"      => "textarea"
                    ),
                    array(
                        "title"      => __('After header ad 2',TEMPLATE_DMN),
                        "desc"      => "",
                        "id"        => "after_header_ad_2",
                        "default"   => '',
                        "type"      => "textarea"
                    ),
                )
            );
            $this->sections[] = array(
                'title'     => __('Social Media',TEMPLATE_DMN),
                'desc'      => '',
                'icon'      => 'el-icon-facebook',
                'fields'    => array(

                    array(     "title"      => __('Facebook',TEMPLATE_DMN),
                                "desc"      => "ex: https://www.facebook.com/shahbasoft",
                                "id"        => "facebook_acc",
                                "default"       => "https://www.facebook.com/shahbasoft",
                                "type"      => "text"
                        ),


                    array(     "title"      => __('Google Plus',TEMPLATE_DMN),
                                "desc"      => "ex: https://plus.google.com/+example",
                                "id"        => "google_acc",
                                "default"       => "https://plus.google.com/113217984529217139752",
                                "type"      => "text"
                        ),

                    array(     "title"      => __('Youtube',TEMPLATE_DMN),
                                "desc"      => "ex: http://www.youtube.com/example",
                                "id"        => "yoututbe_acc",
                                "default"       => "http://www.youtube.com/channel/UC5IHiyBsebDMQZI0uaANWGg",
                                "type"      => "text"
                        ),

                    array(     "title"      => __('Vimeo',TEMPLATE_DMN),
                                "desc"      => "eg. http://vimeo.com/example",
                                "id"        => "vimeo_acc",
                                "default"       => "http://vimeo.com/example",
                                "type"      => "text"
                        ),
                    array(
                                'id'    => 'opt-divide',
                                'type'  => 'divide'
                        ),
                    array(     "title"      => __('Twitter',TEMPLATE_DMN),
                                "desc"      => "ex: http://twitter.com/shahbasoft",
                                "id"        => "twitter_acc",
                                "default"       => "http://twitter.com/shahbasoft",
                                "type"      => "text"
                        ),

                    array(     "title"      => "Twitter Consumer Key",
                                "desc"      => "",
                                "id"        => "twitter_api_consumer_key",
                                "default"       => "",
                                "type"      => "text"
                        ),

         array(     "title"      => "Twitter Consumer Secret",
                                "desc"      => "",
                                "id"        => "twitter_api_consumer_secret",
                                "default"       => "",
                                "type"      => "text"
                        ),

         array(     "title"      => "Twitter Access Token",
                                "desc"      => "",
                                "id"        => "twitter_api_access_key",
                                "default"       => "",
                                "type"      => "text"
                        ),

         array(     "title"      => "Twitter Access Token Secret",
                                "desc"      => "",
                                "id"        => "twitter_api_access_secret",
                                "default"       => "",
                                "type"      => "text"
                        ),

                    array(
                                'id'    => 'opt-divide',
                                'type'  => 'divide'
                        ),
         array(     "title"      => "Instagram usertitle",
                                "desc"      => "ex: shahbasoft",
                                "id"        => "instagram_usertitle",
                                "default"       => "shahbasoft",
                                "type"      => "text"
                        ),
         array(     "title"      => "Instagram user id",
                                "desc"      => "",
                                "id"        => "instagram_user_id",
                                "default"       => "",
                                "type"      => "text"
                        ),
         array(     "title"      => "Instagram access token",
                                "desc"      => "",
                                "id"        => "instagram_access_token",
                                "default"       => "",
                                "type"      => "text"
                        ),

                )
            );
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'          => 'shahbaOptions',            // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'      => $theme->get('Name'),     // Name that appears at the top of your panel
                'display_version'   => $theme->get('Version'),  // Version that appears at the top of your panel
                'menu_type'         => 'submenu',                  //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'    => true,                    // Show the sections below the admin menu item or not
                'menu_title'        => __('Theme Option',TEMPLATE_DMN),
                'page_title'        => __('Theme Option',TEMPLATE_DMN),

                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => '', // Must be defined to add google fonts to the typography module

                'async_typography'  => false,                    // Use a asynchronous font on the front end or font string
                'admin_bar'         => true,                    // Show the panel pages on the admin bar
                'global_variable'   => '',                      // Set a different name for your global variable other than the opt_name
                'dev_mode'          => false,                    // Show the time the page took to load, etc
                'customizer'        => true,                    // Enable basic customizer support

                // OPTIONAL -> Give you extra features
                'page_priority'     => 301,                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'       => 'themes.php',            // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'  => 'manage_options',        // Permissions needed to access the options panel.
                'menu_icon'         => '',                      // Specify a custom URL to an icon
                'last_tab'          => '',                      // Force your panel to always open to a specific tab (by id)
                'page_icon'         => 'icon-themes',           // Icon displayed in the admin panel next to your menu_title
                'page_slug'         => '_options',              // Page slug used to denote the panel
                'save_defaults'     => true,                    // On load save the defaults to DB before user clicks save or not
                'default_show'      => false,                   // If true, shows the default value next to each field that is not the default value.
                'default_mark'      => '',                      // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,                   // Shows the Import/Export panel when not used as a field.

                // CAREFUL -> These options are for advanced use only
                'transient_time'    => 60 * MINUTE_IN_SECONDS,
                'output'            => true,                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'        => true,                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'              => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info'           => false, // REMOVE

                // HINTS
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                        'hide'      => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.facebook.com/shahbasoft',
                'title' => 'Like us on Facebook',
                'icon'  => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://twitter.com/shahbasoft',
                'title' => 'Follow us on Twitter',
                'icon'  => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://plus.google.com/u/0/b/113217984529217139752/113217984529217139752',
                'title' => 'Find us on Google Plus',
                'icon'  => 'el-icon-googleplus'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.youtube.com/channel/UC5IHiyBsebDMQZI0uaANWGg',
                'title' => 'Find us on Youtube',
                'icon'  => 'el-icon-youtube'
            );
            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace('-', '_', $this->args['opt_name']);
                }
            }
        }
    }
    //$shahbaConfig = get_option('shahbaOptions');
    new shahba_options_config();
    global $shahbaConfig;
    $shahbaConfig = get_option('shahbaOptions');
}