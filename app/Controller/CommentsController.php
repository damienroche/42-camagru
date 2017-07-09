<?php

namespace App\Controller;
use \App;
use \App\Model\Comment;

class CommentsController extends AppController
{

  public function add()
  {
    $comment = new Comment($_SESSION['id'], $_POST['token'], $_POST['content']);
    $comment->create();
  }


}


?>
