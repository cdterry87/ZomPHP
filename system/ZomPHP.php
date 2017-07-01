<?php

class ZomPHP{
	
	public $config;
	public $db;
	
	private $_view_data=array();
	private $_view_params=array();
	
	/* --------------------------------------------------------------------------------
	 * Constructor executes when the initial system object is created
	 * -------------------------------------------------------------------------------- */
	public function __construct(){

	}
	
	/* --------------------------------------------------------------------------------
	 * The application starts here
	 * -------------------------------------------------------------------------------- */
	public function run($config){
		//Initialize variable configurations
		$this->config=$config;
		
		//Load the specified controller
		$this->controller();
	}
	
	/* --------------------------------------------------------------------------------
	 * Load a specified controller based on the URL
	 * -------------------------------------------------------------------------------- */
	public function controller(){
		//Get the specified controller from the URL (or the default configuration)
		$controller=$this->config['default_controller'];
		if(isset($_GET['_z'])){
			$controller=$_GET['_z'];
		}
		$controller=rtrim($controller,'/');
		
		//Set the full controller path
		$controller_path=$_SERVER['DOCUMENT_ROOT'].'/'.$this->config['base_url'].'/application/controllers/'.$controller.'.php';
		$controller_path=str_replace('//', '/', $controller_path);
		
		//Store the leftover segments of the controller path
		$valid_controller_params=array();
		
		//Check if the controller path is valid and load the specified controller
		if(file_exists($controller_path)){
			//Exact controller found
			$valid_controller_path=$controller_path;
		}else{
			//Exact controller NOT found so find the next best match
			$valid_controller_path="";
			
			$controller_path_array=explode('/',$controller_path);
			$controller_path="";
            foreach($controller_path_array as $index=>$segment){
				//Build controller path one segment at a time to check if the file exists
				$controller_path.=$segment.'/';
				$controller_path_check=substr($controller_path,0,-1).'.php';
				
				//Save each valid path; the last valid path will be the path that is loaded
                if(file_exists($controller_path_check)){
                    $valid_controller_path=$controller_path_check;
                }else{
					//Once a valid controller path has been established
					if($valid_controller_path!=''){
						//Start over with new view parameters
						empty($this->_view_params);
						
						//Remove .php extension from segment
						$segment=str_replace('.php','',$segment);
						
						//If segment contains '=', turn it into a key/val pair, otherwise just add the actual segment to the array
						if(strpos($segment, '=')!==false){
							$segment_array=explode('=',$segment,2);
							$this->_view_params[$segment_array[0]]=$segment_array[1];
						}else{
							$this->_view_params[]=$segment;
						}
					}
                }
            }
		}
		
		//Load the specified controller
		if(trim($valid_controller_path)!='' and file_exists($valid_controller_path)){
			return require_once($valid_controller_path);
		}
		
		return false;
	}
	
	/* --------------------------------------------------------------------------------
	 * Load a specified view and pass data to the view
	 * -------------------------------------------------------------------------------- */
	public function view($file, $data=''){
		//Set the full view path
		$view_path=$_SERVER['DOCUMENT_ROOT'].'/'.$this->config['base_url'].'/application/views/'.$file.'.php';
		$view_path=str_replace('//', '/', $view_path);
		
		//Check to see if the page exists
		if(file_exists($view_path)){
			//If data is set, load the data into the view data variable for screen parsing
			if(!empty($data) and is_array($data)){
				$this->_view_data=array_merge($data, $this->_view_data);
			}
			//If view data is set, extract the array elements into individual variables
			if(!empty($this->_view_data) and is_array($this->_view_data)){
				extract($this->_view_data);
			}
			
			//Load the view file into the output buffer
			ob_start();
			include($view_path);
			$view=ob_get_contents();
			
			//Print the page to the browser window
			ob_end_clean();
			
			return print($view);
		}
		
		return false;
	}
	
	/* --------------------------------------------------------------------------------
	 * Get specified parameter from the URL
	 * -------------------------------------------------------------------------------- */
	public function get_param($index){
		if(array_key_exists($index,$this->_view_params)){
			return $this->_view_params[$index];
		}
		return false;
	}
	
	/* --------------------------------------------------------------------------------
	 * Load a specified model class
	 * -------------------------------------------------------------------------------- */
	public function model($file){
		$model_path=$_SERVER['DOCUMENT_ROOT'].'/'.$this->config['base_url'].'/application/models/'.$file.'.php';
		$model_path=str_replace('//', '/', $model_path);
		
		//Load the specified model
		if(file_exists($model_path)){
			require_once($model_path);
		
			//Get the name of the model so the class object can be created
			$model_name_array=explode('/', $file);
			$model_name=$model_name_array[count($model_name_array)-1];
			
			//Create the class object
			if(class_exists($model_name)){
				return new $model_name();
			}
		}
		
		return false;
	}
	
	/* --------------------------------------------------------------------------------
	 * Get the value of a config item
	 * -------------------------------------------------------------------------------- */
	public function config($item){
		if(array_key_exists($item, $this->config)){
			return $this->config[$item];
		}
	}
	
	/* --------------------------------------------------------------------------------
	 * Load a specified library of functions
	 * -------------------------------------------------------------------------------- */
	public function library($file){
		
	}
	
}