<?php

require '../app/Autoloader.class.php';
App\Autoloader::register();

$datas = App\App::getDb()->query("SELECT * FROM users", "App\Model\User");
var_dump($datas);

$router = App\App::createRouter();
$router->get('/', function() {
  echo "home";
});

$router->get('/images', function() {
  echo "toutes les images";
});

$router->get('/images/:id', function($id) {
  echo "afficher l'image " . $id ;
});

$router->post('/images/:id', function($id) {
  echo "poster pour l'image" . $id ;
});

$router->debug();
$router->run();

?>
