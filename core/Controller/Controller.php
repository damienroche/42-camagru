<?php

namespace Core\Controller;

class Controller
{
  /**
   * [$viewPath description]
   * @var string
   */
  protected $viewPath;

  /**
   * [$layout description]
   * @var string
   */
  protected $layout;

  /**
   * @param string $view
   * @param array $vars
   */
  public function render($view, $vars)
  {
    ob_start();
    extract($vars);
    require($this->viewPath . str_replace('.', '/', $view) . '.php');
    $content = ob_get_clean();
    require($this->viewPath . 'layouts/' . $this->layout . '.php');

  }

}


?>
