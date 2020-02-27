<?php


namespace Inc\Services;


class Form
{
    private $errors;
    private $post;

    public function __construct($errors, $method = 'POST')
    {
        if ($method == 'POST') {
            $this->post = $_POST;
        } else {
            $this->post = $_GET;
        }
        $this->errors = $errors;
    }

    public
    function label($name, $label)
    {
        $html = '<label for="' . $name . '">' . $label . '</label>';
        return $html;
    }

    public function getValue($name)
    {
        return !empty($this->post[$name]) ? $this->post[$name] : null;
    }

    public
    function input($name, $type = 'text')
    {
        $html = '<input name="' . $name . '" type= "' . $type . '" id="' . $name . '" value = "' . $this->getValue($name) . '">';
        return $html;
    }

    public function textarea()
    {

        return '<textarea>';
    }

    public function submit($name = 'submitted', $value = 'envoyer')
    {
        $html = '<input type="submit"  name="' . $name . '" value="' . $value . '" >';
        return $html;
    }

    public function error($name)
    {
        $error = !empty($this->errors[$name]) ? $this->errors[$name] : '';
        return '<span class="error">' . $error . '</span>';
    }

}
