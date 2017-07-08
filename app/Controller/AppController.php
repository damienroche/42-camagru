<?php

namespace App\Controller;
use Core\Controller\Controller;

class AppController extends Controller
{

  protected $layout = 'default';

  public function __construct()
  {
    $this->viewPath = ROOT . '/app/View/';
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
