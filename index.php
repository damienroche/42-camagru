<?php

require 'vendor/autoload.php';

$router = new Core\Router\Router($_GET['url']);

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


// IF App object is not set-up then execute config/setup.php

// $bdd->exec("CREATE TABLE IF NOT EXISTS `users`(
//   `id` INT PRIMARY KEY AUTO_INCREMENT,
//   `username` VARCHAR(255),
//   `passwd` VARCHAR(255),
//   `email` VARCHAR(255),
//   `is_confirmed` BOOLEAN DEFAULT 0,
//   `created_date` TIMESTAMP);");

// echo 'Users table is created !';
// print_r($_GET);
?>
