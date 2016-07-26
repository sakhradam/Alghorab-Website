<?php if(is_single() or is_page()) { ?>

    <article>
         <div class="section_title">
            <h1><?php the_title( ); ?></h1>
        </div>
        <?php if( shahbaHelper::get_option('show_thumbnail_in_single',true) && has_post_thumbnail()) { ?>
        <figure class="main_article_style_1">
            <img src="<?php echo shahbaHelper::thumbnail(get_the_id()) ?>" alt="img"/>
        </figure>
        <?php } ?>
        <div class="pix-content-wrap">
            <div class="detail_text rich_editor_text">
                <?php shahba_posted_on() ?>
                <div class="detail-blog-text">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </article>

<?php } else { ?>

    <article class="main_article separative">
        <div class="row">
            <div class="col-sm-6">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo shahbaHelper::thumbnail(get_the_id(),'featured-image') ?>" alt="img"/>
                </a>
            </div>
            <div class="col-sm-6">
                <a href="<?php the_permalink(); ?>">
                    <div class="item_title_2 main_color">
                        <h3><?php the_title(); ?></h3>
                    </div>
                </a>
                <?php shahba_posted_on() ?>
                <aside class="excerpt">
                    <p><?php echo shahbaHelper::character_limiter(get_the_excerpt(),70);?></p>
                </aside>
            </div>
        </div>
    </article> <!-- end main article -->

<?php } ?>