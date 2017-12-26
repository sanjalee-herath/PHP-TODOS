<?php

/*===========================================================
| User Routes
=============================================================*/
$router->get('PHPTODOS/signup','UsersController@storeView');
$router->post('PHPTODOS/signup','UsersController@store');

$router->get('PHPTODOS/login','UsersController@loginView');
$router->post('PHPTODOS/login','UsersController@login');

$router->get('PHPTODOS/logout','UsersController@logout');


/*===========================================================
| Task Routes
=============================================================*/
// get all tasks
$router->get('PHPTODOS','TaskController@index');
$router->get('PHPTODOS/task','TaskController@get');
$router->post('PHPTODOS/task','TaskController@store');

$router->get('PHPTODOS/update','TaskController@updateView');
$router->post('PHPTODOS/update','TaskController@update');

$router->get('PHPTODOS/delete/task','TaskController@destroy');



