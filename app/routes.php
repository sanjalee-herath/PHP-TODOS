<?php

$router->get('PHPTODOS','PagesController@home');

$router->get('PHPTODOS/tasks','PagesController@task');

$router->post('PHPTODOS/users','UsersController@store');

$router->get('PHPTODOS/add-task','UsersController@storeTasks');