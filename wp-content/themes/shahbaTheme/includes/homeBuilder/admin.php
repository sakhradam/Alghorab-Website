<?php

add_action( 'wp_ajax_shahba_delete_cache', 'shahba_delete_cache' );
add_action( 'wp_ajax_nopriv_shahba_delete_cache', 'shahba_delete_cache' );
function shahba_delete_cache(){
    delete_transient( 'shahba_license' );
    if(function_exists('wp_cache_clear_cache')){
        wp_cache_clear_cache();
        echo 'clear wp_super_cache<br/>';
    }
    echo 'license= ', (int) shahbaHelper::check_license();
    wp_die();
}

add_action( 'wp_ajax_shahba_home_builder', 'ajax_shahba_home_builder' );
add_action( 'wp_ajax_nopriv_shahba_home_builder', 'ajax_shahba_home_builder' );
function ajax_shahba_home_builder(){
    $data = get_option( 'shahba_home_builder', '' );
    if(!$data) $data = array();
    if( is_array($data) ) {
        echo json_encode($data);
    } else {
        echo $data;
    }
    die;
}

add_action( 'wp_ajax_shahba_save_home_builder', 'ajax_save_shahba_home_builder' );
function ajax_save_shahba_home_builder(){
    $new_value = json_decode( file_get_contents("php://input") );
    $new_value = $new_value->blocks;
    if ( get_option( 'shahba_home_builder' ) !== false ) {
        update_option( 'shahba_home_builder', $new_value );
    } else {
        add_option( 'shahba_home_builder', $new_value, NULL, 'no' );
    }
    die;
}
add_action('admin_menu', 'baw_create_menu');
function baw_create_menu() {
    add_submenu_page( 'themes.php',__('Home Builder',TEMPLATE_DMN), __('Home Builder',TEMPLATE_DMN), 'administrator', 'shahbaHomeBuilder', 'baw_settings_page' );
}

function homeBuilder_scripts() {
    if(!@$_GET['page']=='shahbaHomeBuilder')
        return;
    wp_enqueue_style('homeBuilder-font-awesome','http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css',false,'PLUGIN_VERSION',false);
    wp_enqueue_style('homeBuilder-style',TEMPLATE_URL.'/includes/homeBuilder/css/style.css',false,'1',false);
    wp_enqueue_script('jquery');
    wp_enqueue_script('angular-js',TEMPLATE_URL.'js/angular.min.js',array('jquery'));
    wp_enqueue_script('homeBuilder-ctrl',TEMPLATE_URL.'/includes/homeBuilder/js/mainCtrl.js',NULL,'1',true);
    wp_enqueue_script('homeBuilder-Service',TEMPLATE_URL.'/includes/homeBuilder/js/commentService.js',NULL,'1',true);
    wp_enqueue_script('homeBuilder-app',TEMPLATE_URL.'/includes/homeBuilder/js/app.js',NULL,'1',true);
    wp_enqueue_script('angular-ui-sortable', TEMPLATE_URL.'/includes/homeBuilder/js/sortable.js', array('jquery'));
    wp_enqueue_script('jquery-ui','http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js');
}
add_action('admin_enqueue_scripts', 'homeBuilder_scripts');

function baw_settings_page() {
?>
<div class="wrap" id="shahbaBuilder">
    <h2><?php _e('Shahba Home Builder',TEMPLATE_DMN);?></h2>
    <div class="shahba_home_builder" ng-app="blockApp" ng-controller="mainController">
    <div class="col-md-8 col-md-offset-2">
        <form ng-submit="saveChanges()">
        <!-- <pre>{{blocks}}</pre> -->
        <button ng-click="addBlock()" class="btn" ><i class="fa fa-plus" ></i> <?php _e('New',TEMPLATE_DMN)?></button>
        <button ng-click="saveChanges()" class="btn btn-success" ><i class="fa fa-save" ></i> <?php _e('Save',TEMPLATE_DMN)?></button>
        <!-- <button ng-click="refresh()" class="btn btn-success" ><i class="fa fa-save" ></i> Refresh</button> -->
        <ul ui:sortable="sortableOptions" ng:model="blocks">
            <li class="row block" ng-hide="loading" ng-repeat="block in blocks" >
                <div>
                    <div ng-click="toggleBlock(block)" class="block_title">
                        {{block.title}}
                        <i class="fa fa-sort <?=is_rtl()?'pull-left':'pull-right'?>" ></i>
                    </div>
                    <div ng-show="block.show">
                    <hr />
                    <input type="hidden" class="order" ng-model="block.order" />
                    <label class="home_builder_label"><?php _e('Title',TEMPLATE_DMN)?>: </label>
                    <input class="input" ng-model="block.title" />
                    <?php $categories = get_categories(); ?>
                    <br/>
                    <label class="home_builder_label"><?php _e('Category',TEMPLATE_DMN)?>: </label>
                    <select ng-model="block.category">
                        <option value="">اخر المقالات</option>
                        <?php foreach ($categories as $cat) { ?>
                            <option value="<?=$cat->term_id?>"><?=$cat->name?></option>
                        <?php } ?>
                    </select>
                    <br/>
                    <label class="home_builder_label"><?php _e('Number',TEMPLATE_DMN)?>: </label>
                    <input class="input sm" ng-model="block.showposts" value="5" />
                    <br/>
                    <label class="home_builder_label"><?php _e('Style',TEMPLATE_DMN)?>: </label>
                    <label ng-repeat="style in styles" ng-class="{shahbaImageRadioActive: block.style==style.name}" class="shahba-image-select" >
                        <input ng-model="block.style" type="radio" value="{{style.name}}">
                        <img alt="{{style.name}}" title="{{style.name}}" src="<?=TEMPLATE_URL?>includes/homeBuilder/img/{{style.name}}.png">
                    </label>
                    <button ng-click="deleteblock($index)" class="btn delete_block_btn btn-danger <?=is_rtl()?'pull-left':'pull-right'?>" ><i class="fa fa-trash-o" ></i></button>
                    </div>
                </div>
            </li>
        </ul>
        <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>
        </form>
    </div>
    </div>
</div>
<?php } ?>