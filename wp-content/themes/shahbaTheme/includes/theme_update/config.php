<?php

//Initialize the update checker.
require 'theme-update-checker.php';
$example_update_checker = new ThemeUpdateChecker(
    'shahbaTheme',                                            //Theme folder name, AKA "slug".
    'http://shahbasoft.com/update_center/shahbaTheme/info.php' //URL of the metadata file.
);