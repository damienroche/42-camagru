<?php

class App {

  public $title = "Camagru";
  private static $database;
  private static $router;
  private static $_instance;

  public static function getInstance()
  {
    if (is_null(self::$_instance))
      self::$_instance = new App();
    return self::$_instance;
  }

  public static function getDb()
  {
    $conf = Core\Config::getInstance('../config/database.php');
    if (self::$database === null)
      self::$database = new Core\Database(
        $conf->get('db_name'),
        $conf->get('db_user'),
        $conf->get('db_pwd'),
        $conf->get('db_host'),
        $conf->get('db_dsn')
      );
    return self::$database;
  }

  public static function createRouter()
  {
    if (self::$router === null)
      self::$router =  new Core\Router\Router($_GET['url']);
    return self::$router;
  }

  public static function load()
  {
    session_start();
    require dirname(__DIR__) . '/app/Autoloader.class.php';
    App\Autoloader::register();
    require ROOT . '/core/Autoloader.class.php';
    Core\Autoloader::register();
  }

}

?>
