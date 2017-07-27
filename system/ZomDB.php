<?php

class ZomDB{
	protected static $connection;
	protected $db;
	
	/* ----------------------------------------------------------------------
	 * Get current database connection instance when database object is created
	 * ---------------------------------------------------------------------- */
	public function __construct(){
		$this->db=self::$connection;
	}
	
	/* ----------------------------------------------------------------------
	 * Connect to a database
	 * ---------------------------------------------------------------------- */
	public function connect($database, $conn='default'){
		try{
			if($conn!='' and array_key_exists($conn, $database)){
				self::$connection=new PDO('mysql:host='.$database[$conn]['host'].';dbname='.$database[$conn]['name'], $database[$conn]['user'], $database[$conn]['pass']);
				
				return $this->db=self::$connection;
			}else{
				echo "<h1>Invalid database configuration!</h1>";
			}
		}catch(PDOException $e){
			echo "<h1>Datbase connection error!</h1>";
			echo "<p>".$e->getMessage()."</p>";
		}
		return false;
	}
	
	/* --------------------------------------------------------------------------------
	 * Prepare data to be inserted into a database table
	 * -------------------------------------------------------------------------------- */
	final protected function prepare($table, $data=''){
		$prepared = array();
		
		//If data is not defined, assume data is $_POST
		if($data==''){
			$data=$_POST;
			
			//If data is not $_POST, assume data is $_GET
			if(empty($data)){
				$data=$_GET;
			}
		}
		
		if(!empty($data) and is_array($data)){
			//Loop through the data and attempt to format it if needed
			foreach($data as $key=>$val){
				$auto_parse="N";
				$temp_key='';
				$temp_val='';
				
				//If field is an array, combine the field values into one value
				if(is_array($val) and !empty($val)){
					foreach($val as $key2=>$val2){
						$temp_val.=$val2;
					}
					$data[$key]=$temp_val;
				}else{
					//If anything needs to be auto-parsed, do it here
					if($auto_parse=="Y"){
						if(!array_key_exists($temp_key,$data)){
							$data[$temp_key]=$val;
						}else{
							$data[$temp_key].=$val;
						}
					}
				}
			}
			
			//Get a list of database fields from the specified table
			$db_fields_sql=$this->db->prepare('DESCRIBE '.$table);
			$db_fields_sql->execute();
			$db_fields=$db_fields_sql->fetchAll(PDO::FETCH_COLUMN);
			
			if(!empty($db_fields) and is_array($db_fields)){
				//Compare field names to the database field names, and if the fields are in the database, add them to the prepared array
				//The end result should leave out anything that was on the screen but isn't in the database so there won't be any SQL errors
				foreach($data as $key=>$val){
					if(in_array($key,$db_fields)){
						$prepared[$key] = $val;
					}
				}
			}else{
				//If a list of database fields could not be retrieved, set prepared variable to the original data
				$prepared=$data;
			}
			
			//Return the prepared array
			return $prepared;
		}
		return false;
	}
}