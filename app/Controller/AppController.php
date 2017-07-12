<?php

namespace App\Controller;
use Core\Controller\Controller;
use App\ORM;

class AppController extends Controller
{

  protected $layout = 'default';
  protected $orm;

  public function __construct()
  {
    $this->viewPath = ROOT . '/app/View/';
    $this->orm = ORM::getInstance();
  }

  protected function areset($array)
  {
    foreach ($array as $value) {
      if (isset($value) == false || $value == '')
        return false;
    }
    return true;
  }

}


?>
