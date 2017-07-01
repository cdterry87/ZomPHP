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
		$data=$this->prepare('tasks');
		
		$id=$data['task_id'];
		unset($data['task_id']);
		
		if($data and !empty($data)){
			if(trim($id)==''){
				//Insert Record (if an id IS NOT present on the screen)
				$params='';
				$values='';
				foreach($data as $key=>$val){
					$params.=$key.', ';
					$values.=':'.$key.', ';
				}
				$params=substr($params,0,-2);
				$values=substr($values,0,-2);
				$sql="insert into tasks (".$params.") VALUES (".$values.")";
			}else{
				//Update Record (if an id IS present on the screen)
				$params='';
				foreach($data as $key=>$val){
					$params.=$key.'=:'.$key.', ';
				}
				$params=substr($params,0,-2);
				$sql="update tasks set ".$params." where task_id=:task_id";
			}
			
			//Execute the query
			$result=$this->db->prepare($sql);
			foreach($data as $key=>$val){
				$result->bindValue(':'.$key, $val);
			}
			if($id!=''){
				$result->bindValue(':task_id', $id);
			}
			$result->execute();
			
			return true;
		}
		return false;
	}
	
	/* --------------------------------------------------------------------------------
	 * Validate required fields
	 * -------------------------------------------------------------------------------- */
	public function validate(){
		//Turn all POST data into variables.
		extract($_POST);
		
		//By default, pass.
		$pass=true;
		
		if(trim($task)==''){
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
	
	/* --------------------------------------------------------------------------------
	 * Validate required fields
	 * -------------------------------------------------------------------------------- */
	public function get_messages(){
		
	}
	
}