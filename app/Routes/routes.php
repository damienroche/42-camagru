<?php

$router->get('/snapshots/add', function() {
  $controller = new \App\Controller\SnapshotsController();
  $controller->add();
});

$router->post('/snapshots/create', function() {
  $controller = new \App\Controller\SnapshotsController();
  $controller->create();
});

$router->get('/snapshots/:id', function($id) {
  $controller = new \App\Controller\SnapshotsController();
  $controller->show($id);
});

$router->get('/snapshots', function() {
  $controller = new \App\Controller\SnapshotsController();
  $controller->index();
});

$router->get('/users/:id', function($id) {
  echo "user.show " . $id;
});

$router->get('/users', function() {
  $controller = new \App\Controller\UsersController();
  $controller->index();
});

$router->post('/users/create', function() {
  $controller = new \App\Controller\UsersController();
  $controller->create();
});

$router->post('/users/login', function() {
  $controller = new \App\Controller\AuthController();
  $controller->login();
});

$router->get('/', function() {
  $controller = new \App\Controller\HomeController();
  $controller->index();
});

// $router->debug();
$router->run();

?>
