<?php

namespace Core\Controller;

class Controller
{

  protected $viewPath;
  protected $layout;

  public function render($view, $vars = array())
  {
    ob_start();
    extract($vars);
    require($this->viewPath . str_replace('.', '/', $view) . '.php');
    $content = ob_get_clean();
    require($this->viewPath . 'layouts/' . $this->layout . '.php');

  }

}


?>
