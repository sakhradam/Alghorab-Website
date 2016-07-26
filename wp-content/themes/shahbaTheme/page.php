<?php get_header() ?>
        <main class="main">
            <section class="main_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="main_content">
                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                    <section class="block">
                                        <?php get_template_part( 'content',get_post_type() ); ?>
                                    </section>
                                    <?php get_template_part( 'templates/author' ); ?>
                                    <?php comments_template( ); ?>
                                <?php endwhile; endif; ?>
                            </div> <!-- end main content -->
                        </div>
                        <?php get_sidebar(); ?>
                    </div>
                </div> <!-- end container -->
            </section> <!-- end main section -->
        </main>
<?php get_footer(); ?>