<?php

namespace App\controller;

use App\model\Task;

class TaskController{

    private $model;

    public function __construct(){

        $this->model = new Task;
    }

    public function index(){
        session();
        $this->model->index('task',$_SESSION['user_name']);
    }

    public function get(){
        session();
        $this->model->get($_SESSION['user_name'],$_GET['id']);

    }

    public function updateView(){
        
        session();
        $this->model->updateView(
            $_SESSION['user_name'],$_SESSION['taskid']
        );
    }
        
        
    public function update(){
        
        session();
        $this->model->update(
            $_SESSION['taskid'],
            $_POST['name'],
            $_POST['description'],
            $_SESSION['user_name']
        );
    }

    public function store(){
        session();
        $this->model->store(
            $_POST['name'] ,
            $_POST['description'] , 
            $_SESSION['user_name']
        );
    }

    public function destroy(){
        session();
        $this->model->destroy(
            'task',
            $_SESSION['user_name'],
            $_GET['id']
        );
    }
}