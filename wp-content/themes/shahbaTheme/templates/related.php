<?php
query_posts( shahbaHelper::get_related_args(3) );
if ( have_posts() ) {
?>
                                <section class="block">
                                    <div class="section_title">
                                        <h1><?php _e('RELATED POSTS',TEMPLATE_DMN)?></h1>
                                    </div>
                                    <div class="row">
                                        <?php
                                        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                        <article class="col-sm-4">
                                            <div class="item_post">
                                                <a href="<?php the_permalink(); ?>">
                                                    <figure>
                                                        <img src="<?php echo shahbaHelper::thumbnail(get_the_id(),'featured-image') ?>" alt="img">
                                                    </figure>
                                                    <div class="item_title">
                                                        <span class="img_post_title" style="bottom: 0;">
                                                            <h3><?php the_title(); ?></h3>
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                        </article>
                                        <?php endwhile; endif; ?>
                                    </div>
                                </section>
<?php
}
wp_reset_query();
?>