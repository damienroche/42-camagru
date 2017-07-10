<?php

namespace App\Model;
use \App;

class Snapshot extends Table
{

  private $description;
  private $user_id;
  private $path;
  private $base64;
  private $token;
  private $img;
  private $created_date;
  private $extension = '.png';

  public function __construct($base64, $user_id, $description = '')
  {
    $this->created_date = date("Y-m-d H:i:s");
    $this->base64 = $base64;
    $this->description = $description;
    $this->user_id = $user_id;
    $this->token = hash('md5', strtotime($this->created_date) . 'im4g3_t00k3n#io');
    $this->img = $this->token . $this->extension;
    $this->createImage();
  }

  public function create()
  {
    $req = App::getDb()->getPDO()->prepare("
      INSERT INTO snapshots (user_id, description, created_date, token, img)
      VALUES (:user_id, :description, :created_date, :token, :img);
    ");
    $req->bindParam(':user_id', $this->user_id);
    $req->bindParam(':description', $this->description);
    $req->bindParam(':created_date', $this->created_date);
    $req->bindParam(':token', $this->token);
    $req->bindParam(':img', $this->img);
    $req->execute();
  }

  private function createImage()
  {
    $data = explode( ',', $this->base64);
    file_put_contents(ROOT . '/www/assets/images/snapshots/'. $this->token . '.png', base64_decode( $data[1]));
  }

}

?>
