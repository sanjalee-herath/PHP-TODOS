<?php

namespace App\controller;

use App\core\App;

class UsersController {

    public function taskList(){
        session();
        $tasks = App::get('database')->selectTask('task',$_SESSION['user_id']);
        return view('viewTask',['tasks'=>$tasks]);
    }

    public function manageTask(){
        session();
        $tasks = App::get('database')->selectTaskDes('task',$_SESSION['user_id'],$_GET['id']);
        return view('manageTask',['tasks'=>$tasks]);

    }

    public function editTask(){
        session();
        $tasks = App::get('database')->selectTaskDes('task',$_SESSION['user_id'],$_GET['id']);
        return view('editTask',['tasks'=>$tasks]);

    }


    public function store(){

        App::get('database')->insert('user',[
            'name' => $_POST['name'],
            'password' => $_POST['password']
            ]);
    
        return redirect('login');
    
    }

    public function storeTasks(){
        session();
        App::get('database')->insert('task',[
            'name'=>$_GET['name'],
            'description'=>$_GET['description'],
            'user_id'=>$_SESSION['user_id']
        ]);

        return redirect('viewTasks');
    }

    public function deleteTasks(){
        session();
        App::get('database')->delete('task',$_SESSION['user_id'],$_GET['id']);

        return redirect('viewTasks');
    }

    public function login(){

       $user = App::get('database')->checklogin($_POST['userid'],$_POST['password']);

       if($user === false){
           die('incorrect username or password!');
       }
       else{

            return redirect('viewTasks');
       }
    }

    public function updateTask(){
         //die($_GET['description']); 
        session();
        die($_GET['id']);
        App::get('database')->update($_GET['id'],$_GET['description'],$_SESSION['user_id']);
        return redirect('viewTasks');
    }
}