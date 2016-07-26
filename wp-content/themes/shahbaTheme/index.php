<?php get_header(); ?>
        <main class="main">
            <?php get_template_part( 'templates/before_slider_ads' ); ?>
            <section class="main_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="main_content">
                            <?php get_template_part( 'templates/slider' ); ?>
                            <?php $blocks = get_option( 'shahba_home_builder', array() );?>
                            <?php
                                if(!is_array($blocks)){
                                    $blocks = json_decode($blocks);
                                }
                                if(is_array($blocks))
                                foreach ($blocks as $block) {
                                    $block = shahbaHelper::validate_block($block);
                                ?>
                                <?php
                                if($block->style){
                                    include ( locate_template( 'templates/block-'.$block->style.'.php',false,false) );
                                }
                                ?>
                            <?php } ?>
                            </div>
                        </div>
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </section> <!-- end main section -->
        </main>
<?php get_footer(); ?>