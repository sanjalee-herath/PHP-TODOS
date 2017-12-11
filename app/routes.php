<?php

$router->get('PHPTODOS','PagesController@home');

$router->post('PHPTODOS/users','UsersController@store');