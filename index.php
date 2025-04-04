<?php

use Utils\Router;
use Utils\Autoloader;
use Exceptions\RouteNotFoundException;

require_once "./utils/Autoloader.php";
Autoloader::register();

$router = new Router();
$router->register("/", "Controllers\HomeController::index");
$router->register("/play", "Controllers\SlotController::play");
try {
  $router->resolve($_SERVER["REQUEST_URI"]);
} catch (RouteNotFoundException $e) {
  echo $e->getMessage();
}
