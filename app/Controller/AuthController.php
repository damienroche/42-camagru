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
      header('Location: '. $_SERVER['HTTP_REFERER']);
    }
    else {
      $_SESSION['flash'] = 'Incorrect credentials';
      header('Location: '. $_SERVER['HTTP_REFERER']);
    }
  }

  public function logout()
  {
    if (!empty($_SESSION['id'])) {
      unset($_SESSION['auth']);
      unset($_SESSION['id']);
    }
    header('Location: /');
  }

  public function logged()
  {
    return isset($_SESSION['id']);
  }

  public function signupForm()
  {
    if ($this->logged())
      header('Location: /');
    else
      $this->render('auth.signup', []);
  }

  public function loginForm()
  {
    if ($this->logged())
      header('Location: /');
    else
      $this->render('auth.login', []);
  }
}


?>
