<?php

namespace App\Controller;
use \App;
use \App\Model\User;
use \Core\Auth\Email;

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

  public function show($username)
  {
    //get all snapshots taken by user
    $user = App::getDb()->prepare("SELECT * FROM users WHERE username = ?", [$username], null, true);
    $snapshots = App::getDb()->prepare("SELECT * FROM snapshots WHERE user_id = ?", [$user->id], null);
    $this->render('users.show', ['user' => $user, 'snapshots' => $snapshots]);
  }

  /**
   * Insert New user in database with somes conditions
   * @return boolean
   */
  public function create()
  {
    var_dump($_POST);
    if (empty($_POST)) return ;

    //check if username, email and password are not empty
    if ($this->areset([$_POST['username'], $_POST['email'], $_POST['password']]) == false) return false;

    //check if username and email are availables
    $db = App::getInstance()->getDb();
    $user = $db->prepare('SELECT * FROM users WHERE username = ?', [$_POST['username']], null, true);
    $email = $db->prepare('SELECT * FROM users WHERE email = ?', [$_POST['email']], null, true);

    if ($user || $email) return false;

    // create user
    // @todo check if email is valid ?
    $user = new User($_POST['username'], $_POST['email'], $_POST['password']);
    $user->create();

    // send confirmation email
    // $email = new Email($_POST['email'], $_POST['username']);
    // $email->send();

  }
}


?>
