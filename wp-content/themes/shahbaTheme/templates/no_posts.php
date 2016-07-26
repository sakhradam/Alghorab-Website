                    <div class="row">
                        <div class="col-md-5">
                            <div class="one_third useful_links">
                                <h2><?php _e('Here are some useful links:',TEMPLATE_DMN)?></h2>
                                <ul id="checklist-1" class="error-menu list-icon list-icon-arrow circle-yes">
                                    <li>
                                        <a href="<?php bloginfo('url'); ?>">
                                            <i class="fa <?php echo (!is_rtl())?'fa-angle-right':'fa-angle-left' ?>"></i>
                                            <?php _e('Home',TEMPLATE_DMN)?>
                                        </a>
                                    </li>
                                    <?php $pages = get_pages(array('number'=>6)); foreach ($pages as $page) { ?>
                                        <li>
                                            <a href="<?= get_page_link( $page->ID );?>">
                                                <i class="fa <?php echo (!is_rtl())?'fa-angle-right':'fa-angle-left' ?>"></i><?=$page->post_title?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h2><?php _e('Search Our Website',TEMPLATE_DMN)?></h2>
                            <p><?php _e("Can't find what you need? Take a moment and do a search below!",TEMPLATE_DMN)?></p>
                            <?php get_search_form( true ); ?>
                        </div>
                    </div>