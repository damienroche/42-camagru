<?php

namespace App\Controller;
use \App;
use \Core\Auth\DbAuth;

class SnapshotsController extends AppController
{
  public function index()
  {
    $snapshots = new App\Model\Snapshot();
    $this->render('snapshots.index', $snapshots->all());
  }

  public function add()
  {
    $auth = new DbAuth(App::getInstance()->getDb());
    if ($auth->logged()) {
      $this->render('snapshots.add');
    } else {
      header('Location: /403');
    }

  }

  public function create()
  {
    $this->render('snapshots.create');

  }

  public function edit()
  {

  }

  public function show($id)
  {
    $db = App::getInstance()->getDb();
    $item = $db->prepare('SELECT * FROM snapshots WHERE id = ?', [$id], null, true);
    $comments = $db->prepare('SELECT c.*, u.username FROM comments c LEFT JOIN users u ON u.id = c.user_id WHERE image_id = ?', [$id], get_called_class());
    $this->render('snapshots.show', ['snapshot' => $item, 'comments' => $comments]);
  }
}


?>
