<?php

namespace App\Controller;
use \App;

class HomeController extends AppController
{
  public function index()
  {
    $db = App::getInstance()->getDb();
    $snapshots = $db->query('SELECT s.*, u.username as author FROM snapshots s LEFT JOIN users u ON u.id = s.user_id ORDER BY s.created_date DESC', get_called_class());
    $this->render('home.index', ['snapshots' => $snapshots]);
  }
}

?>
