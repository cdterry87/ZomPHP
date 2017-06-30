<?php

$data['content']='sample/tasks';

$task=$this->model('sample/Task_model');

$data['tasks']=$task->get_tasks();

$this->view('template', $data);