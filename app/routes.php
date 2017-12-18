<?php

$router->get('PHPTODOS','PagesController@home');

$router->get('PHPTODOS/tasks','PagesController@task');

$router->get('PHPTODOS/viewTasks','PagesController@viewTask');

$router->get('PHPTODOS/login','PagesController@loginView');

$router->post('PHPTODOS/users','UsersController@store');

$router->get('PHPTODOS/add-task','UsersController@storeTasks');

$router->get('PHPTODOS/delete-task','UsersController@deleteTasks');

$router->get('PHPTODOS/viewTasks','UsersController@taskList');

$router->post('PHPTODOS/log','UsersController@login');

$router->get('PHPTODOS/manage-task','UsersController@manageTask');