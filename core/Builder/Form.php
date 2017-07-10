<?php

namespace Core\Builder;

/**
 * Class Form
 * Generate quick forms
 */
class Form
{
  /**
   * Array of datas send by instance
   * @var array
   */
  private $data;

  /**
   * @param array $data Data used by form instance
   */
  public function __construct($data = array())
  {
    $this->data = $data;
  }

  /**
   * @param $action string Path of action file
   * @param $method string Expect GET or POST (GET by default)
   * @return string Open html form with action and method
   */
  public function open($action = '', $method = 'GET')
  {
    return "<form action='". $action ."' method='". $method ."'>";
  }

  /**
   * @return string Close html form tag
   */
  public function close()
  {
    return "</form>";
  }

  /**
   * @param $index string
   * @return string
   */
  private function getValue($index)
  {
    return isset($this->data[$index]) ? $this->data[$index] : null;
  }

  /**
   * @param $name string
   * @param $type string
   * @param $placeholder string
   * @return string
   */
  public function input($name, $type = 'text', $placeholder = '')
  {
    return "<input type='" . $type . "' name='" . $name  . "' placeholder='" . $placeholder . "' value='" . $this->getValue($name) . "'>";
  }

  /**
   * @param $name string
   * @param $type string
   * @param $value string
   * @return string
   */
  public function hidden($name, $value, $id = '')
  {
    if (empty($id))
      $id = $name;
    return "<input type='hidden' name='" . $name  . "' value='" . $value . "' id='". $id ."'>";
  }

  /**
   * @param $for string
   * @param $label string
   * @return string
   */
  public function label($for, $label)
  {
    return "<label for='" . $for  . "'>". $label ."</label>";
  }

  /**
   * @param $value string
   * @return string
   */
  public function submit($value = 'OK', $id = '')
  {
    if (!empty($id))
      return "<input type='submit' value='". $value ."' id='". $id ."'>";
    return "<input type='submit' value='". $value ."'>";
  }

}

?>
