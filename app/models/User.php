<?php

namespace App\model;

use App\core\App;

class User{

    public function store($name,$password){

        $user = App::get('database')->getUser($name);
        
            if($user['name']){
        
                die('this username is already available..choose another!');
            }
            else{

                App::get('database')->insert('user',[
                    'name' => $name,
                    'password' =>md5($password) 
                    ]);
            
                return redirect('login');

            }

    }

    public function login($name,$password){

        session();
        
                $user = App::get('database')->checklogin($name);
        
               
               if($user['password'] == md5($password)){
                   $_SESSION['user_name'] = $name;
                   return redirect('');
               }
               else{
                    die('incorrect username or password!');
                   
               }
    }
}