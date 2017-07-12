<?php

namespace App\Model;
use App;

class ORM extends Table {

  public function __construct()
  {
  }


  public function deleteSnapshotRelations($token, $id)
  {
    $this->deleteSnapshot($token, $id);
    $this->deleteSnapshotComments($id);
  }

  private function deleteSnapshot($token, $id)
  {
    $req = App::getDb()->getPDO()->prepare("
      DELETE FROM snapshots
      WHERE id = :id AND token = :token;
    ");
    $req->bindParam(':id', $id);
    $req->bindParam(':token', $token);
    $req->execute();
  }

  private function deleteSnapshotComments($snap_id)
  {
    $req = App::getDb()->getPDO()->prepare("
      DELETE FROM comments WHERE image_id = :snap_id
    ");
    $req->bindParam(':snap_id', $snap_id);
    $req->execute();
  }

}

?>
