<?php global $shahbaConfig; ?>
        <footer class="main-footer">
            <?php if( shahbaHelper::get_option( 'show_footer_widgets' , true ) ){?>
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar( 'footer' ); ?>
                </div> <!-- end row -->
            </div> <!-- end container -->
            <?php } ?>
            <section class="lower-foot">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="textwidget">
                                <!-- do not remove the credit line -->
                                <?php 
                                if( shahbaHelper::check_license() ){
                                    echo shahbaHelper::get_option('rights_txt');
                                } else {
                                    _e('ShahbaTheme by ',TEMPLATE_DMN)?> <a href="http://SHAHBASOFT.com" target="_blank" class="main_color">Shahbasoft</a>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="textwidget rights">
                                <?php echo $shahbaConfig['footer_txt'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </footer>
         <?php wp_footer(); ?>
    </body>
</html>