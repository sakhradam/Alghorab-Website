<?php global $shahbaConfig; ?>
<?php if( ! shahbaHelper::get_option( 'show_slider' , true ) ) return ; ?>
            <section class="slider_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="slider_main">
                                <div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php
                                        if(is_array($shahbaConfig['slider-category'])){
                                            $cat = implode(',', $shahbaConfig['slider-category']);
                                        } else {
                                            $cat = $shahbaConfig['slider-category'];
                                        }
                                        query_posts( array(
                                            'cat'=>$cat,
                                            'showposts'=>$shahbaConfig['slider_posts_num'],
                                            'meta_key'=>'_thumbnail_id')
                                        );
                                        $first = true;
                                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                                        ?>
                                            <div class="item <?=($first)?'active':''?>">
                                                <figure>
                                                    <img src="<?= shahbaHelper::thumbnail(get_the_id(),'featured-image') ?>"/>
                                                </figure>
                                                <a href="<?php the_permalink(); ?>" >
                                                <div class="carousel-caption">
                                                    <h2><?php the_title(); ?></h2>
                                                    <p><?php echo shahbaHelper::character_limiter(get_the_excerpt(),150); ?></p>
                                                </div>
                                                </a>
                                            </div>
                                        <?php
                                        $first = false;
                                        endwhile;
                                        endif;
                                        wp_reset_query();
                                        ?>
                                    </div>
                                    <a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                    </a>
                                </div>
                            </div> <!-- end slider main -->
                        </div>
                        <div class="col-sm-4">
                            <div class="blocks">
                                <div class="row">
                                <?php
                                query_posts( array('cat'=>$shahbaConfig['posts-next-slider-category'],'showposts'=>'2') );
                                $first = true;
                                if ( have_posts() ) : while ( have_posts() ) : the_post();
                                ?>
                                <div class="col-sm-12">
                                    <?php get_template_part( 'templates/block_item','image' ); ?>
                                </div>
                                <?php
                                $first = false;
                                endwhile;
                                endif;
                                wp_reset_query();
                                ?>
                                </div>
                            </div> <!-- end blocks -->
                        </div>
                    </div>
                </div>
            </section> <!-- end slider section -->