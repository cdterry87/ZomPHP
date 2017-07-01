<?php

$task=$this->model('sample/Task_model');

$data['tasks']=$task->get_tasks();

$data['content']='sample/tasks';

$this->view('template', $data);