<?php

$router->get('PHPTODOS','PagesController@home');

$router->get('PHPTODOS/tasks','PagesController@task');

$router->get('PHPTODOS/deleteTasks','PagesController@deleteTask');

$router->post('PHPTODOS/users','UsersController@store');

$router->get('PHPTODOS/add-task','UsersController@storeTasks');

$router->get('PHPTODOS/delete-task','UsersController@deleteTasks');