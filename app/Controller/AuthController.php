<?php

namespace App\Controller;
use \App;
use \Core\Auth\DbAuth;

class AuthController extends AppController
{
  public function login()
  {
    $auth = new DbAuth(App::getInstance()->getDb());
    if ($auth->login($_POST['username'], $_POST['password']))
      $_SESSION['auth'] = $_POST['username'];
    else
      die ('pas connecté');
  }
}


?>
