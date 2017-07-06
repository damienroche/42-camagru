<?php

namespace App\Controller;
use \App;

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

  public function create($name, $password, $email)
  {

  }
}


?>
