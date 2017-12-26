<?php

namespace App\controller;

use App\core\App;

class UsersController {

    public function storeView(){
        
        //require 'views/index.view.php';
        return view('register');
    }

    public function store(){

        App::get('database')->insert('user',[
            'name' => $_POST['name'],
            'password' =>md5($_POST['password']) 
            ]);
    
        return redirect('login');
    
    }

    public function loginView(){
        
        return view('login');
    }

    
    public function login(){
       $user = App::get('database')->checklogin($_POST['userid']);

       var_dump($user);
       if($user['password'] == md5($_POST['password'])){
           return redirect('');
       }
       else{
            die('incorrect username or password!');
           
       }
    }


    public function logout(){

        session();
        $_SESSION = array();
        session_destroy();
        return redirect('login');
    }

    
}