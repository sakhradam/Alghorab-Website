<?php get_header(); ?>
    <main class="main">
        <section class="main_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="main_content">

                            <?php get_template_part( 'templates/author' ); ?>

                            <section class="block">
                                <div class="section_title">
                                    <h1><?php printf( __( 'All posts by %s', TEMPLATE_DMN ), get_the_author() ); ?></h1>
                                </div>

                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                                    <?php get_template_part( 'content','index' ); ?>

                                <?php endwhile; endif; ?>

                            </section> <!-- end main block -->
                        </div>
                    </div>

                    <?php get_sidebar(); ?>

                </div>
            </div>
        </section> <!-- end main section -->
    </main>
<?php get_footer(); ?>