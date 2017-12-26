<?php

namespace App\controller;

use App\core\App;

class TaskController{

    public function index(){
        session();
        echo $_SESSION['user_id'];
        $tasks = App::get('database')->selectTasks('task',$_SESSION['user_id']);
        return view('viewTask',['tasks'=>$tasks]);
    }

    public function get(){
        session();
        $tasks = App::get('database')->selectTask(
            'task',$_SESSION['user_id'],$_GET['id']
        );

        return view('manageTask',['tasks'=>$tasks]);

    }

    public function updateView(){
        
        session();
        $tasks = App::get('database')->fetchTask(
            $_SESSION['user_id'],$_SESSION['taskid']
        );

        return view('editTask',['tasks'=>$tasks]);
    }
        
        
    public function update(){
        
        session();
        App::get('database')->updateTask(
            $_SESSION['taskid'],
            $_POST['name'],
            $_POST['description'],
            $_SESSION['user_id']
        );

        $tasks = App::get('database')->fetchTask(
            $_SESSION['user_id'],$_SESSION['taskid']
        );

        return view('editTask',['tasks'=>$tasks]);
    }

    public function store(){
        session();
        App::get('database')->insert('task',[
            'name'=>$_POST['name'],
            'description'=>$_POST['description'],
            'user_id'=>$_SESSION['user_id']
        ]);

        return redirect('');
    }

    public function destroy(){
        session();
        App::get('database')->delete('task',$_SESSION['user_id'],$_GET['id']);

        return redirect('');
    }
}