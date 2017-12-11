<?php

namespace App\controller;

class PagesController{

    public function home(){

        //require 'views/index.view.php';
        return view('register');
    }


    public function task(){

        //require 'views/task.view.php';
        return view('task');
    }

    public function deleteTask(){

        return view('deleteTask');
    }

    public function viewTask(){
        
        return view('viewTask');
    }
}