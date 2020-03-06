<?php
namespace Inc\Service;

class Form
{
  private $errors;
  private $post;
  /**
   *
   */
  public function __construct($errors, $method = 'POST')
  {
    if($method == 'POST') {
      $this->post = $_POST;
    } else {
      $this->post = $_GET;
    }
    $this->errors = $errors;
  }
  /**
   * label
   * @param $name string
   * @param $label string
   * @return string
   */
  public function label(string $name,string $label)
  {
    return '<label for="'.$name.'">'.$label.'</label>';
  }
  private function getValue($name)
  {
    return !empty($this->post[$name]) ? $this->post[$name] : '';
  }

  public function input($name, $type='text')
  {
    return '<input type="'.$type.'" name="'.$name.'" id="'.$name.'" value="'.$this->getValue($name).'" />';
  }

    public function radio($name, $value)
    {
        $html = '<input name="'. $name . '" type=radio " id="' . $name . '" value = "' . $value . '">';
        return $html;
    }

  public function textarea($name)
  {
    return '<textarea name="'.$name.'">'.$this->getValue($name).'</textarea>';
  }

  public function submit($name= 'submitted',$value = 'Envoyer')
  {
    return '<input type="submit" name="'.$name.'" value="'.$value.'"/>';
  }

    public function error($name)
    {
        if(!empty($this->errors[$name])) {
            return '<p class="error">'.$this->errors[$name].'</p>';
        }
        return null;
    }

}
