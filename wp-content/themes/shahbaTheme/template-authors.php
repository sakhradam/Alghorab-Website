<?php
/*
Template Name:Authors
*/
global $shahbaConfig;
get_header(); ?>
    <main class="main">
        <section class="main_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="main_content">
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <section class="block">
                                <div class="section_title">
                                    <h1><?php the_title(); ?></h1>
                                </div>
                                <?php the_content(); ?>
                            </section> <!-- end main block -->
                            <?php endwhile; endif; ?>


<?php
global $wpdb;
$blog_id = get_current_blog_id();

$roles = $shahbaConfig['authers_page_roles'];
$meta_query =  array();
if(is_array($roles)){
    $meta_query = array(
        'key' => $wpdb->get_blog_prefix($blog_id) . 'capabilities',
        'value' => '"(' . implode('|', array_map('preg_quote', $roles)) . ')"',
        'compare' => 'REGEXP'
    );
}
$authors = new WP_User_Query(array(
    'meta_query' => array($meta_query)
));

?>
<section class="block">
<?php
foreach ($authors->results as $key => $author) {
$author_id = $author->data->ID;
?>
                                <div class="author_list_item" >
                                    <div class="section_title">
                                        <h2> <?php echo $author->data->display_name?> </h2>
                                    </div>
                                    <div class="author">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <?php echo get_avatar( $author_id ); ?>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="auther_info">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="social_2">
                                                                <ul class="row">
                                    <?php if(get_the_author_meta('shahbaTheme_facebook',$author_id)){ ?>
                                    <li>
                                        <a target="_blank" href="<?php echo get_the_author_meta('shahbaTheme_facebook',$author_id) ?>"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <?php } ?>

                                    <?php if(get_the_author_meta('shahbaTheme_vine',$author_id)){ ?>
                                    <li>
                                        <a target="_blank" href="<?php echo get_the_author_meta('shahbaTheme_vine',$author_id) ?>"><i class="fa fa-vine"></i></a>
                                    </li>
                                    <?php } ?>

                                    <?php if(get_the_author_meta('shahbaTheme_twitter',$author_id)){ ?>
                                    <li>
                                        <a target="_blank" href="<?php echo get_the_author_meta('shahbaTheme_twitter',$author_id) ?>"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <?php } ?>

                                    <?php if(get_the_author_meta('shahbaTheme_youtube',$author_id)){ ?>
                                    <li>
                                        <a target="_blank" href="<?php echo get_the_author_meta('shahbaTheme_youtube',$author_id) ?>"><i class="fa fa-youtube"></i></a>
                                    </li>
                                    <?php } ?>

                                    <?php if(get_the_author_meta('shahbaTheme_instagram',$author_id)){ ?>
                                    <li>
                                        <a target="_blank" href="<?php echo get_the_author_meta('shahbaTheme_instagram',$author_id) ?>"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <?php } ?>

                                    <?php if(get_the_author_meta('shahbaTheme_google-plus',$author_id)){ ?>
                                    <li>
                                        <a target="_blank" href="<?php echo get_the_author_meta('shahbaTheme_google-plus',$author_id) ?>"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <?php } ?>
                                    <li>
                                        <a target="_blank" href="<?php echo get_author_feed_link($author_id)?>"><i class="fa fa-rss"></i></a>
                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>
                                                    <?php the_author_meta( 'description',$author->data->ID ); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php } ?>
                                </section>

                        </div>
                    </div>

                    <?php get_sidebar(); ?>

                </div>
            </div>
        </section> <!-- end main section -->
    </main>
<?php get_footer(); ?>