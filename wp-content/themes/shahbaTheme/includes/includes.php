<?php
include 'classes/bootstrap_3_nav.php';
include 'classes/shahba_helper.php';
include 'classes/pagination.php';
include 'plugins_installer/config.php';
include 'metabox/third_party/Taxonomy_MetaData/Taxonomy_MetaData_CMB.php';
include 'metabox/config.php';
include 'theme_update/config.php';
if(is_admin()) {
    include 'redux/redux.php';
}