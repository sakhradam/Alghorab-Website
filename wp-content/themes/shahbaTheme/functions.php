<?php
/**
if you want to make changes on the theme, we recomend you to build a child theme
في حال كنت تريد إجراء تعديلات على القالب, فمن الأفضل أن تقوم بإنشاء قالب ابن منه
*/
// Constants
define('TEMPLATE_VER' , '1.1.3' );
define('TEMPLATE_DIR' , get_template_directory().'/');
define('TEMPLATE_URL' , get_bloginfo('template_url').'/');
define('TEMPLATE_TMP' , TEMPLATE_DIR.'templates/');
define('TEMPLATE_DMN' , 'shahba-theme');

// Custom theme setup
function custom_theme_setup()
{
    register_nav_menu( 'primary', __('Main Menue',TEMPLATE_DMN) );
    register_nav_menu( 'top_menue', __('Top Menue',TEMPLATE_DMN) );
    add_theme_support( 'post-thumbnails' );
    // Language Support
    $path = get_template_directory() . '/lang';
    load_theme_textdomain(TEMPLATE_DMN, $path ) ;
    load_theme_textdomain('redux-framework', $path ) ;
    load_theme_textdomain('taxonomy-metadata', $path ) ;
    load_theme_textdomain('CMB', $path ) ;
    include TEMPLATEPATH.'/includes/redux/OptionsConfig.php';
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

function shahbaTheme_excerpt_more( $more ) {
    return ' ...';
}
add_filter('excerpt_more', 'shahbaTheme_excerpt_more');

// sidebar
register_sidebar(array(
    'name' => __('Sidebar',TEMPLATE_DMN),
    //'id' => 'default_sidebar',
    'description' => '',
    'before_widget' => '<section id="sid_sociale %1$s" class="widget block %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<div class="section_title"><h2>',
    'after_title' => '</h2></div>',
));
// footer
register_sidebar(array(
    'name' => __('Footer',TEMPLATE_DMN),
    'id' => 'footer',
    'description' => '',
    'before_widget' => '<div id="%1$s" class="col-md-3 %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="widgettitle">',
    'after_title' => '</div>',
));



if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'small-thumb', 70, 70, true ); //(cropped)
    add_image_size( 'featured-image', 750, 364, true ); //(cropped)
}
function shahba_posted_on(){
    global $post;
    get_template_part( 'templates/post_meta', $post->post_type );
}
function shahba_front_scripts() {
        wp_enqueue_script('jquery');
        wp_enqueue_script('bootstrap',TEMPLATE_URL.'js/bootstrap.min.js');
        wp_enqueue_style('bootstrap',TEMPLATE_URL."css/bootstrap.css",false,'1',false);
        wp_enqueue_style('font-awesome',"http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css",false,'1',false);
        wp_enqueue_style('shahba-style',TEMPLATE_URL."css/style.css",false,'1',false);
        wp_enqueue_style('shahba-comment',TEMPLATE_URL."css/comment.css",false,'1',false);
        wp_enqueue_style('shahba-fonts',TEMPLATE_URL."css/fonts.css",false,'1',false);
}
add_action('wp_enqueue_scripts', 'shahba_front_scripts');

function shahbaTheme_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o =  __( "To view this protected post, enter the password below:" ) . '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post" class="input-group">
    <label for="' . $label . '">' . __( "" ) . ' </label><input placeholder="'.__('Password').'" class="form-control" name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><span class="input-group-btn"><input style="padding: 8px;" class="btn main_bg" type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" /></span>
    </form>
    ';
    return $o;
}
add_filter( 'the_password_form', 'shahbaTheme_password_form' );
function shahbatheme_post_nav() {
    global $post;

    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <nav class="navigation post-navigation" role="navigation">
        <!-- <h1 class="screen-reader-text"><?php _e( 'Post navigation', TEMPLATE_DMN ); ?></h1> -->
        <div class="nav-links">

            <?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', TEMPLATE_DMN ) ); ?>
            <?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', TEMPLATE_DMN ) ); ?>

        </div><!-- .nav-links -->
    </nav><!-- .navigation -->
    <div style="clear:both" ></div>
    <?php
}

function shahbaTheme_wp_title( $title, $sep ) {
    $title .= $sep .' '. get_bloginfo( 'name' );
    return $title;
}
add_filter( 'wp_title', 'shahbaTheme_wp_title', 10, 2 );

function get_main_color(){
    global $shahbaConfig;
    return $shahbaConfig['main_color'];
}
/**
* get the category color
* get the selected category color in category edit page and if it does not exists it will return the main site color
* @param int $cat_id category id
* @return string category color
*/
function get_category_color($cat_id){
    $color = Taxonomy_MetaData::get( 'category', $cat_id, 'color' );
    if(!$color){
        return get_main_color();
    }
    return $color;
}
add_action( 'admin_bar_menu', 'toolbar_link_shahbatheme', 999 );
function toolbar_link_shahbatheme( $wp_admin_bar ) {
    if(get_locale()=='ar'){
        $href = 'http://shahbasoft.com/ar/%D9%85%D8%B9%D9%84%D9%88%D9%85%D8%A7%D8%AA-%D9%87%D8%A7%D9%85%D8%A9-%D8%B9%D9%86-%D9%82%D8%A7%D9%84%D8%A8-%D8%B4%D9%87%D8%A8%D8%A7-%D8%A7%D9%84%D9%85%D8%AC%D8%A7%D9%86%D9%8A-%D8%A8%D8%B9%D8%AF-%D8%A7/';
    } else {
        $href = 'http://www.shahbasoft.com/important-info-shahbatheme/';
    }
    $args = array(
        'id'    => 'toolbar_link_shahbatheme',
        'title' => 'ShahbaTheme',
        'href'  => $href,
        'meta'  => array( 'class' => 'shahbatheme-toolbar-page' )
    );
    $wp_admin_bar->add_node( $args );
}
add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Home', 'theme_domain' ) . get_bloginfo( 'description' );
  }
  return $title;
}
// Includes
include 'includes/includes.php';
include 'includes/widgets/index.php';
include 'includes/homeBuilder/admin.php';
