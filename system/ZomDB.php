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
}