<?php

namespace App\Controller;
use \App;
use \App\Model\Comment;

class CommentsController extends AppController
{

  public function add()
  {
    //@todo make some check before create comment ?
    $comment = new Comment($_SESSION['id'], $_POST['token'], $_POST['content']);
    $comment->create();
    header('Location: /');
  }


}


?>
