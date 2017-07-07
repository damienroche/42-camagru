<?php

namespace App\Controller;
use \App;

class SnapshotsController extends AppController
{
  public function index()
  {
    $snapshots = new App\Model\Snapshot();
    $this->render('snapshots.index', $snapshots->all());
  }

  public function add()
  {
    $this->render('snapshots.add');

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
    $snapshots = new App\Model\Snapshot();
    $items[] = $snapshots->getById($id);

    $this->render('snapshots.show', $items);
  }
}


?>
