<?php

namespace App\Controller;
use \App;
use \App\Model\User;

class UsersController extends AppController
{
  public function index()
  {
    $users = App::getDb()->query("SELECT * FROM users", "App\Model\User");
    $this->render('users.index', $users);
  }

  public function edit()
  {

  }

  public function show()
  {

  }

  /**
   * Insert New user in database with somes conditions
   * @return boolean
   */
  public function create()
  {
    if (empty($_POST)) return ;

    //check if username, email and password are not empty
    if ($this->areset([$_POST['username'], $_POST['email'], $_POST['password']]) == false) return false;

    //check if username and email are availables
    $db = App::getInstance()->getDb();
    $user = $db->prepare('SELECT * FROM users WHERE username = ?', [$_POST['username']], null, true);
    $email = $db->prepare('SELECT * FROM users WHERE email = ?', [$_POST['email']], null, true);

    if ($user || $email) return false;

    // create user
    $user = new User($_POST['username'], $_POST['email'], $_POST['password']);
    $user->createUser();

    // auto-login user
    // $user->login();

  }
}


?>
