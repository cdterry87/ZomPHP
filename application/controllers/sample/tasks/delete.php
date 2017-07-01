<?php

$task=$this->model('sample/Task_model');

//If an id is set, get the task by its id
if($task_id=$this->get_param('id')){
	$task->delete($task_id);
}

$data['tasks']=$task->get_tasks();

//Return to tasks list
redirect('sample/tasks');