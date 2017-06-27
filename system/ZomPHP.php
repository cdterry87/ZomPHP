<?php

class ZomPHP{
	
	public $config;
	public $db;
	
	public function __construct(){
		
	}
	
	/* ----------------------------------------------------------------------
	 * The application starts here
	 * ---------------------------------------------------------------------- */
	public function run(){
		//Initialize variable configurations
		$this->config=$config;
		
		//Load the specified controller
		$this->controller();
	}
	
	/* ----------------------------------------------------------------------
	 * Load a specified controller based on the URL
	 * ---------------------------------------------------------------------- */
	public function controller(){
		
	}
	
	/* ----------------------------------------------------------------------
	 * Load a specified view and pass data to it
	 * ---------------------------------------------------------------------- */
	public function view($view, $data=''){
		
	}
	
	/* ----------------------------------------------------------------------
	 * Load a specified model
	 * ---------------------------------------------------------------------- */
	public function model(){
		
	}
	
	/* ----------------------------------------------------------------------
	 * Get the value of a config item
	 * ---------------------------------------------------------------------- */
	public function config(){
		
	}
	
	/* ----------------------------------------------------------------------
	 * Load a specified library
	 * ---------------------------------------------------------------------- */
	public function library(){
		
	}
	
}