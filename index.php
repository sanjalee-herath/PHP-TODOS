<?php

require 'vendor/autoload.php';
require 'core/bootstrap.php';

use App\core\Router;
use App\core\Request;

Router::load('app/routes.php')->direct(Request::url(),Request::method()) ;