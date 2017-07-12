<?php

namespace App\Controller;
use \App;
use \Core\Auth\DbAuth;
use \App\Model\Snapshot;

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
    var_dump($_POST);
    // @todo -> check if image, user_id & description exists
    // check if image is a real image
    $type = "data:image/png;base64,";
    if (substr($_POST['base64'], 0, strlen($type)) !== $type) return ;
    $snapshot = new Snapshot($_POST['base64'], $_SESSION['id'], $_POST['description']);
    $snapshot->create();
    header('Location: /');
  }

  public function delete()
  {
    // @todo -> check errors & empty keys
    $this->orm->deleteSnapshotRelations($_POST['token'], $_POST['id']);
    $this->deleteImage($_POST['token']);

  }

  public function edit()
  {

  }

  public function show($id)
  {
    $db = App::getInstance()->getDb();
    $item = $db->prepare('SELECT s.*, u.username as author FROM snapshots s LEFT JOIN users u ON u.id = s.user_id WHERE s.id = ?', [$id], null, true);
    if (!$item)
      return App::notFound();
    $comments = $db->prepare('SELECT c.*, u.username FROM comments c LEFT JOIN users u ON u.id = c.user_id WHERE image_id = ?', [$id], get_called_class());
    $this->render('snapshots.show', ['snapshot' => $item, 'comments' => $comments]);
  }

  private function deleteImage($token)
  {

  }
}


?>
