<?php
/*
Plugin Name: No Accents for uploads
Description: Empêche les caractères accentués dans les uploads.
Author: Julio Potier
*/

add_filter('sanitize_file_name', 'remove_accents' );