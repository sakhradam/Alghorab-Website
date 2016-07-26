<form role="search" method="get" id="searchform" class="searchform" action="<?php bloginfo( 'url' ); ?>">
    <div class="input-group input-group-lg">
        <input type="text" value="" name="s" id="s" class="form-control" placeholder="<?php _e('Search Text..',TEMPLATE_DMN)?>">
        <span class="input-group-btn">
            <button type="submit" id="searchsubmit" value="<?php _e('Search',TEMPLATE_DMN)?>" class="btn main_bg"><?php _e('Search',TEMPLATE_DMN)?></button>
        </span>
    </div>
</form>