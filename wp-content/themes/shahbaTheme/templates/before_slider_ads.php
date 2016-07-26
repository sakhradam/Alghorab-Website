<?php if(!shahbaHelper::get_option('after_header_ad_1') && !shahbaHelper::get_option('after_header_ad_2')) return; ?>
<div class="container">
    <div id="shahba_header_add">
        <div class="row">
            <div class="col-sm-6">
                <div class="shahba_add">
                    <?=shahbaHelper::get_option('after_header_ad_1');?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="shahba_add">
                    <?=shahbaHelper::get_option('after_header_ad_2');?>
                </div>
            </div>
        </div>
    </div>
</div>