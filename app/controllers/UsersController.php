<?php

namespace App\controller;

use App\core\App;

class UsersController {

    public function index(){

        $users = App::get('database')->selectAll('names');
        return view('users',['users'=>$users]);
    }

    public function store(){

        App::get('database')->insert('user',[ 
            'name' => $_POST['name'],
            'password' => $_POST['password']
            ]);
        
        return redirect('');
        
    }
}