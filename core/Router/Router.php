<?php

namespace Core\Router;
use Core\Router\Route;
use Core\Router\RouterException;

class Router {

  private $url;
  private $routes = array();
  private $namedRoutes = array();

  public function __construct($url) {
    $this->url = $url;
  }

  public function get($path, $callable, $name = null) {
    return $this->add($path, $callable, $name, 'GET');
  }

  public function post($path, $callable, $name = null) {
    return $this->add($path, $callable, $name, 'POST');
  }

  public function add($path, $callable, $name, $method) {
    $route = new Route($path, $callable);
    $this->routes[$method][] = $route;
    if ($name)
      $this->namedRoutes[$name] = $route;
    return $route;
  }

  public function debug() {
    echo '<pre>';
    print_r($this->routes);
    echo '</pre>';
  }

  public function run() {
    if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
      throw new RouterException("REQUEST_METHOD does not exist");
    }
    foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
      if ($route->match($this->url)) {
        return $route->call();
      }
    }
    throw new RouterException("No matching routes");

  }

  public function url($name, $params = array()) {
    if (!isset($this->namedRoutes['$name']))
      throw new RouterException("No route matches this url");

  }
}

?>
