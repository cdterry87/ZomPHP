<?php

/* ----------------------------------------------------------------------
 * Redirect to the specified page
 * ---------------------------------------------------------------------- */
function redirect($page){
	extract($GLOBALS);
	
	header('location: '.$config['base_url'].$page, true);
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