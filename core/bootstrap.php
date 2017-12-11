<?php

use App\core\App;

App::bind('config',require 'config.php');

App::bind('database',new QueryBuilder(
    connection::make(App::get('config')['database']))
);

function view($name,$data = []){

    extract($data);
    return require "app/views/{$name}.view.php";
}

function redirect($location){

    header("Location: /learningPHP/{$location}");
}