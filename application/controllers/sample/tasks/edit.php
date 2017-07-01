<?php

$task=$this->model('sample/Task_model');
if(isset($_POST) and !empty($_POST)){
	if($task->validate()){
		$task->save();
	}
}

//If an id is set, get the task by its id
if($task_id=$this->get_param('id')){
	$data['task']=$task->get_task($task_id);
}

$data['content']='sample/tasks/form';

$this->view('template', $data);