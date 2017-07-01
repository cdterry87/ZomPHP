<?php

class Task_model extends ZomDB{
	
	public function __construct(){
		parent::__construct();
	}
	
	/* --------------------------------------------------------------------------------
	 * Get list of all tasks
	 * -------------------------------------------------------------------------------- */
	public function get_tasks(){
		$query=$this->db->query('select * from tasks order by task_id');
		$result=$query->fetchAll();
		return $result;
	}
	
	/* --------------------------------------------------------------------------------
	 * Get a single task by its id
	 * -------------------------------------------------------------------------------- */
	public function get_task($id){
		$sql=$this->db->prepare("select * from tasks where task_id=:task_id");
		$sql->bindParam(':task_id', $id);
		$sql->execute();
		$row=$sql->fetch(PDO::FETCH_ASSOC);
		
		return $row;
	}
	
	/* --------------------------------------------------------------------------------
	 * Insert/Update a task
	 * -------------------------------------------------------------------------------- */
	public function save(){
		
	}
	
	/* --------------------------------------------------------------------------------
	 * Validate required fields
	 * -------------------------------------------------------------------------------- */
	public function validate(){
		//Turn all POST data into variables.
		extract($_POST);
		
		//By default, pass.
		$pass=true;
		
		if($task==''){
			$pass=false;
		}
		
		return $pass;
	}
	
	/* --------------------------------------------------------------------------------
	 * Validate required fields
	 * -------------------------------------------------------------------------------- */
	public function delete($id){
		$query=$this->db->prepare('delete from tasks where task_id=:task_id');
		$query->bindParam(':task_id',$id);
		$query->execute();
	}
	
}