<?php get_header(); ?>
        <main class="main">
            <section class="main_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="main_content">
                                <section class="block">
                                    <div class="section_title">
                                        <h1>Search : <?php echo @$_GET['s'] ?></h1>
                                    </div>
                                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                        <?php get_template_part( 'content', get_post_type() ); ?>
                                    <?php endwhile; else: ?>
                                        <p><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.',TEMPLATE_DMN)?></p>
                                        <?php get_search_form( true ); ?>
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