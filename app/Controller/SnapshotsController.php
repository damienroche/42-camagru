<?php

namespace App\Controller;
use \App;

class SnapshotsController extends AppController
{
  public function index()
  {
    $snapshots = App::getDb()->query("SELECT * FROM snapshots", "App\Model\Snapshot");
    $this->render('snapshots.index', $snapshots);
  }

  public function edit()
  {

  }

  public function show()
  {

  }
}


?>
