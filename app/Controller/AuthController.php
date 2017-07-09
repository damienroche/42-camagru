<?php

namespace App\Controller;
use \App;
use \Core\Auth\DbAuth;

class AuthController extends AppController
{
  public function login()
  {
    $auth = new DbAuth(App::getInstance()->getDb());
    if ($auth->login($_POST['username'], $_POST['password'])) {
      $_SESSION['auth'] = $_POST['username'];
      header('Location: /');
    }
    else
      die ('pas connecté');
  }

  public function logout()
  {
    if (!empty($_SESSION['auth']))
      unset($_SESSION['auth']);
    header('Location: /');
  }

  public function signupForm()
  {
    $this->render('auth.signup', []);
  }

  public function loginForm()
  {
    $this->render('auth.login', []);
  }
}


?>
