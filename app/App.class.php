<?php

namespace App;

class App {

  private static $database;
  private static $router;

  public static function getDb() {
    if (self::$database === null)
      self::$database = new Database();
    return self::$database;
  }

  public static function createRouter() {
    if (self::$router === null)
      self::$router =  new Router\Router($_GET['url']);
    return self::$router;
  }

}

?>
