<?php

namespace App\Controller;
use \App;

class HomeController extends AppController
{
  public function index()
  {
    $db = App::getInstance()->getDb();
    $snapshots = $db->query('
      SELECT s.*, count(c.id) as comments_count, u.username as author, count(l.id) as likes_count
      FROM snapshots s
      LEFT JOIN comments c ON c.image_id = s.id
      LEFT JOIN likes l ON l.image_id = s.id
      LEFT JOIN users u ON u.id = s.user_id
      GROUP BY s.id
      ORDER BY s.created_date DESC', get_called_class());
    $this->render('home.index', ['snapshots' => $snapshots]);
  }
}

?>
