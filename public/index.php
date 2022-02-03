<?php
require_once "../vendor/autoload.php";

use App\Core\Dispatcher;
use App\Core\Request;
use App\Core\RouteCollection;
use App\Core\EntityManager;

/* $obj = new EntityManager(); */
ini_set('display_errors', 1);
$routes = new RouteCollection();
$request = new Request();
$dispatcher = new Dispatcher($routes, $request);