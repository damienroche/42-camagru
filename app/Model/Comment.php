<?php

namespace App\Model;
use App;
use Core\Auth\DbAuth;

class Comment extends Table {

  private $user_id;
  private $image_token;
  private $image_id;
  private $content;

  public function __construct($user_id, $token, $content)
  {
    $this->user_id = $user_id;
    $this->image_token = $token;
    $this->content = $content;
    $snap = App::getDb()->prepare("
      SELECT id
      FROM snapshots
      WHERE token = ?", [$token], null, true);
    $this->image_id = $snap->id;
  }

  public function create()
  {
    $now = date("Y-m-d H:i:s");
    $req = App::getDb()->getPDO()->prepare("
      INSERT INTO comments (content, image_id, user_id, created_date)
      VALUES (:content, :image_id, :user_id, :created_date);
    ");
    $req->bindParam(':content', $this->content);
    $req->bindParam(':image_id', $this->image_id);
    $req->bindParam(':user_id', $this->user_id);
    $req->bindParam(':created_date', $now);
    $req->execute();
  }
}

?>
