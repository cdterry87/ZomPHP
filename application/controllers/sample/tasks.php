<?php

$data['content']='sample/tasks';

$task=$this->model('example/Task_model');

$data['tasks']=$task->get_tasks();

$this->view('template', $data);