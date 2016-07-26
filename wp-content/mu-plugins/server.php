<?php
/*
Plugin Name: Filter HTTP_X_... headers to avoid web attacks
Description: Filtre les en-têtes HTTP_X pour éviter les attaques.
Author: Julio Potier
AuthorURI: http://boiteaweb.fr
*/
// All HTTP_X_... headers
foreach( $_SERVER as $_header => $_value )
{
	if( strpos( $_header, 'HTTP_X_' )===0 )
	{
		$_SERVER[$_header] = htmlentities( $_value, ENT_QUOTES, 'UTF-8' );
	}
}
unset( $_header );
unset( $_value );
// User-Agent
if( isset( $_SERVER['USER_AGENT'] ) )
{
	$_SERVER['USER_AGENT'] = htmlentities( $_SERVER['USER_AGENT'] );
}