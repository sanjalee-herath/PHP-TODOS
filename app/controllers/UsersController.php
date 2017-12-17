<?php

namespace App\controller;

use App\core\App;

class UsersController {

    public function taskList(){
        
        $tasks = App::get('database')->selectAll('task',$_SESSION['user_id']);
        return view('viewTask',['tasks'=>$tasks]);
    }
    public function store(){

        App::get('database')->insert('user',[
            'name' => $_POST['name'],
            'password' => $_POST['password']
            ]);
        
        return redirect('login');
    
    }

    public function storeTasks(){
        App::get('database')->insert('task',[
            'name'=>$_GET['name'],
            'description'=>$_GET['description'],
            'user_id'=>$_GET['user_id']
        ]);

        return redirect('tasks');
    }

    public function deleteTasks(){
        App::get('database')->delete('task',$_GET['user_id'],$_GET['id']);

        return redirect('deleteTasks');
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
}