<?php get_header(); ?>
        <main class="main">
            <section class="main_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="main_content">
                                <section class="block">
                                    <?php if ( have_posts() ) :  the_post(); ?>
                                    <div class="section_title">
                                        <h1>
                                            <?php if ( is_day() ) : ?>
                                                <?php printf( __( 'Daily Archives: <span>%s</span>', 'tie' ), get_the_date() ); ?>
                                            <?php elseif ( is_month() ) : ?>
                                                <?php printf( __( 'Monthly Archives: <span>%s</span>', 'tie' ), get_the_date( 'F Y' ) ); ?>
                                            <?php elseif ( is_year() ) : ?>
                                                <?php printf( __( 'Yearly Archives: <span>%s</span>', 'tie' ), get_the_date( 'Y' ) ); ?>
                                            <?php else : ?>
                                                <?php _e( 'Blog Archives', 'tie' ); ?>
                                            <?php endif; ?>
                                        </h1>
                                    </div>
                                    <?php endif; ?>
                                    <?php rewind_posts();?>
                                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                        <?php get_template_part( 'content', get_post_type() ); ?>
                                    <?php endwhile; else: ?>
                                        <?php get_template_part('templates/no_posts'); ?>
                                    <?php endif; ?>
                                    <?php bootstrap_pagination()?>
                                </section> <!-- end main block -->
                            </div>
                        </div>
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </section> <!-- end main section -->
        </main>
<?php get_footer(); ?>