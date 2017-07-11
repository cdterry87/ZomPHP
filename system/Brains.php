<?php

/* ----------------------------------------------------------------------
 * Format path with base_url
 * ---------------------------------------------------------------------- */
function base_url($path){
	extract($GLOBALS);
	
	return $config['base_url'].$path;
}

/* ----------------------------------------------------------------------
 * Format a link
 * ---------------------------------------------------------------------- */
function anchor($path, $name='', $attributes=''){
	extract($GLOBALS);
	
	return '<a href="'.$config['base_url'].$path.'" '.$attributes.'>'.$name.'</a>';
}

/* ----------------------------------------------------------------------
 * Redirect to the specified page
 * ---------------------------------------------------------------------- */
function redirect($path){
	extract($GLOBALS);
	
	header('location: '.$config['base_url'].$path, true);
	exit;
}

/* ----------------------------------------------------------------------
 * Get the URI. If a segment is specified, only get that segment
 * ---------------------------------------------------------------------- */
function get_uri($segment=''){
	$uri=$_SERVER['REQUEST_URI'];
	
	if(trim($segment)!='' and is_numeric($segment)){
		$segments=explode('/', $uri);
		if(array_key_exists($segment, $segments)){
			return $segments[$segment];
		}
	}
	return $uri;
}