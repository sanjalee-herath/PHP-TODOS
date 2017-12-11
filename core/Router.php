<?php

namespace App\core;

class Router {

    public $routes = [

        'GET' =>[],
        'POST'=>[]
    ];

    public static function load($file){

        $router = new static;

        require $file;

        return $router;
    }

    public function get($uri,$controller){

        $this->routes['GET'][$uri] = $controller;

    }

    public function post($uri,$controller){

        $this->routes['POST'][$uri] = $controller;

    }

    public function direct($uri,$methodType){

       if(array_key_exists($uri,$this->routes[$methodType])) {

           // return $this->routes[$methodType][$uri];
           return $this->callAction(
               ...explode('@',$this->routes[$methodType][$uri])
            
            );
           
       }

       throw new Exception('No route is defined for this URI');
       
    }

    protected function callAction($controller,$action){

        $controller = "App\\controller\\{$controller}";

        $controller = new $controller;

        if(! method_exists($controller,$action)){

            throw new Exception("{$controller} does not respond to the {$action} action.");
        }

        return  $controller->$action();
    }
}