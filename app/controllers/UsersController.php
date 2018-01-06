<?php

namespace App\controller;

use App\model\User;

class UsersController {

    private $model;

    public function __construct(){

        $this->model = new User;
    }

    public function storeView(){
        
        //require 'views/index.view.php';
        return view('register');
    }

    public function store(){

        $this->model->store($_POST['name'],$_POST['password']);
        
    
    }

    public function loginView(){
        
        return view('login');
    }

    
    public function login(){

        $this->model->login($_POST['username'],$_POST['password']);
    }



    public function logout(){

        session();
        $_SESSION = array();
        if(session_destroy()){
            return redirect('login');
        }
        
    }

    
}