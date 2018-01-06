<?php

namespace App\model;

use App\core\App;

class Task {

    public function index($table,$username){

        $tasks = App::get('database')->selectTasks($table,$username);

        return view('viewTask',['tasks'=>$tasks]);
    }


    public function get($username,$id){

        $tasks = App::get('database')->selectTask($username,$id);

        return view('manageTask',['tasks'=>$tasks]);
    }

    public function updateView($username,$id){

        $tasks = App::get('database')->selectTask( $username,$id);

        return view('editTask',['tasks'=>$tasks]);
    }

    public function update($id,$name,$description,$username){

        App::get('database')->updateTask(
            $id,
            $name,
            $description,
            $username
        );

        $tasks = App::get('database')->selectTask($username,$id);

        return view('editTask',['tasks'=>$tasks]);
    }

    public function store($name,$description,$username){

        App::get('database')->insertTask(
            $name , $description , $username
        );

        return redirect('');
    }

    public function destroy($table,$username,$id){

        App::get('database')->deleteTask($table,$username,$id);
        
        return redirect('');
    }

}