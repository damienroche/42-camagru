<?php




$router->get('/snapshots/:id', function($id) {
  echo "afficher l'image " . $id ;
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

$router->get('/', function() {
  $controller = new \App\Controller\HomeController();
  $controller->index();
});

// $router->post('/images/:id', function($id) {
//   echo "poster pour l'image" . $id ;
// });

// $router->debug();
$router->run();

?>
