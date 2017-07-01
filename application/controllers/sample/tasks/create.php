<?php

$task=$this->model('sample/Task_model');
if(isset($_POST) and !empty($_POST)){
	if($task->validate()){
		$task->save();
	}
}

$data['content']='sample/tasks/form';

$this->view('template', $data);