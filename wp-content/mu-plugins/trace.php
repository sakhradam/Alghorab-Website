<?php

/*

Plugin Name: No TRACE & TRACK request method
Description: No TRACE & TRACK request method.
Author: Julio Potier

AuthorURI: http://boiteaweb.fr

*/

if ( 'TRACE' === $_SERVER['REQUEST_METHOD'] || 'TRACK' === $_SERVER['REQUEST_METHOD']  )

	exit();