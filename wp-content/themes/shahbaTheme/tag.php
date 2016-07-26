<?php get_header(); ?>
        <main class="main">
            <section class="main_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="main_content">
                                <section class="block">
                                    <div class="section_title">
                                        <h1><?php _e('Tag :',TEMPLATE_DMN)?> <?php echo single_tag_title() ?></h1>
                                    </div>
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