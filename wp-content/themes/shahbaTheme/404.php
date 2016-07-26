<?php include('header.php');?>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <section class="block">
                    <div id="post-404page">
                        <div class="post-content section_title">
                            <h1 class="title-heading-left">
                                <?php _e('Oops, This Page Could Not Be Found!',TEMPLATE_DMN) ?>
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="error-message">404</p>
                        </div>
                        <div class="col-md-8">
                            <?php get_template_part('templates/no_posts'); ?>
                        </div>
                    </div>
                </section>
                </div>
                <?php // get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php include('footer.php');