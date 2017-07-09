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
    if ($user)
      return ($user->passwd === hash('sha512', $password));
    return false;
  }
}

?>