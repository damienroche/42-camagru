<?php

namespace App\Model;
use App;

class User extends Table {

  private $username;
  private $email;
  private $password;

  public function __construct($username, $email, $password)
  {
    $this->username = $username;
    $this->email = $email;
    $this->password = hash('sha512', $password);
  }

  public static function getByUsername($username)
  {
    return App::getDb()->prepare("
      SELECT *
      FROM " . static::getTable() . "
      WHERE username = ?
    ", [$username], get_called_class(), true);
  }

  public static function getByEmail($email)
  {
    return App::getDb()->prepare("
      SELECT *
      FROM " . static::getTable() . "
      WHERE email = ?
    ", [$email], get_called_class(), true);
  }

  public function createUser()
  {
    $now = date("Y-m-d H:i:s");
    $req = App::getDb()->getPDO()->prepare("
      INSERT INTO users (username, passwd, email, created_date)
      VALUES (:username, :passwd, :email, :created_date);
    ");
    $req->bindParam(':username', $this->username);
    $req->bindParam(':email', $this->email);
    $req->bindParam(':passwd', $this->password);
    $req->bindParam(':created_date', $now);
    $req->execute();

  }

}

?>
