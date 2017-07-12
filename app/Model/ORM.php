<?php

namespace App\Model;
use App;

class ORM extends Table {

  private $_instance;
  private $db;

  public function __construct()
  {
    $db = App::getDb();
  }

  public static function getInstance()
  {
    if (is_null(self::$_instance))
      self::$_instance = new ORM();
    return self::$_instance;
  }


  public function deleteSnapshotRelations($token, $id)
  {
    $this->deleteSnapshot($token, $id);
    $this->deleteSnapshotComments($id);
  }

  private function deleteSnapshot($token, $id)
  {
    $req = $this->db->getPDO()->prepare("
      DELETE FROM snapshots
      WHERE id = :id AND token = :token;
    ");
    $req->bindParam(':id', $id);
    $req->bindParam(':token', $token);
    $req->execute();
  }

  private function deleteSnapshotComments($snap_id)
  {
    $req = $this->db->getPDO()->prepare("
      DELETE FROM comments WHERE image_id = :snap_id
    ");
    $req->bindParam(':snap_id', $snap_id);
    $req->execute();
  }

}

?>
