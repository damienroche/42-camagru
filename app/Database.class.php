<?php

namespace App;
use \PDO;


class Database {

  private $db_name;
  private $db_user;
  private $db_pwd;
  private $db_host;
  private $db_dsn;
  private $pdo;

  public function __construct() {
    require_once '../config/database.php';
    $this->db_name = $DB_NAME;
    $this->db_user = $DB_USER;
    $this->db_pwd = $DB_PASSWORD;
    $this->db_host = $DB_HOST;
    $this->db_dsn = $DB_DSN;
  }

  private function getPDO() {
    if ($this->pdo === null) {
      $pdo = new PDO($this->db_dsn, $this->db_user, $this->db_pwd);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo = $pdo;
    }
    return $this->pdo;
  }

  public function query($request, $class) {
    $req = $this->getPDO()->query($request);
    $datas = $req->fetchAll(PDO::FETCH_CLASS, $class);
    return $datas;
  }

}

?>
