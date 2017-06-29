<?php

$router->get('/', function() {
  echo "home";
});

$router->get('/snapshots', function() {
  $controller = new \App\Controller\SnapshotsController();
  $controller->index();
});


// $router->get('/images/:id', function($id) {
//   echo "afficher l'image " . $id ;
// });

// $router->post('/images/:id', function($id) {
//   echo "poster pour l'image" . $id ;
// });

// $router->debug();
$router->run();

?>
