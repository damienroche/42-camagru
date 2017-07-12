<?php

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';

App::load();
App::getInstance();

// $users = App::getDb()->query("SELECT * FROM users", "App\Model\User");
// $snapshots = App::getDb()->query("SELECT * FROM snapshots", "App\Model\Snapshot");
// var_dump($users);
// var_dump($snapshots);
// mail('damienroche@free.fr', 'sujet', 'super ça ava');
$router = App::createRouter();
require ROOT . '/app/Routes/routes.php';

?>
