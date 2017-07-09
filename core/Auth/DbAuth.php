<?php

namespace Core\Auth;
use Core\Database;

class DbAuth
{

  private $db;

  public function __construct(Database $db)
  {
    $this->db = $db;
  }

  public function login($username, $password)
  {
    $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
    if ($user) {
      if ($user->passwd === hash('sha512', $password)) {
        $_SESSION['id'] = $user->id;
        return true;
      }
    }
    return false;
  }
}

?>
