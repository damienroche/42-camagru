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
   * Create New User in database with somes conditions
   * @return bool
   */
  public function create()
  {
    var_dump($_POST);
    //check if username, email and password are not empty
    if ($this->areset([$_POST['name'], $_POST['email'], $_POST['password']]) == false) return false;

    //check if username and email are availables
    // $user->getByUsername($_POST['name']);

    // create user
    $user = new User($_POST['name'], $_POST['email'], $_POST['password']);
    $user->createUser();
  }
}


?>
