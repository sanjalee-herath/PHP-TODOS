<?php

namespace App\controller;

class PagesController{

    public function home(){

        //require 'views/index.view.php';
        return view('register');
    }

    public function about(){

        //require 'views/about.view.php';
        $company = 'Laracast';
        return view('about',['company'=>$company]);
    }

    public function contact(){

        //require 'views/contact.view.php';
        return view('contact');
    }
}