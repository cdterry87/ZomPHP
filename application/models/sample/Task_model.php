<?php

class Task_model extends ZomDB{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function get_tasks(){
		$sql=$this->db->query('select * from tasks order by task_id');
		$result=$sql->fetchAll();
		return $result;
		
	}
	
}