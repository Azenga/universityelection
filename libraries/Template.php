<?php
/*
 * The template class
 * This is my templating engine for displaying views
 */

class Template{
    private $template;
    private $vars = array();

    public function __construct($tpl_name)
    {
        $_path = 'templates/'.$tpl_name.'.php';

        if(!empty($_path)){
            if(file_exists($_path)){
                $this->template = $_path;
            }else{
                echo 'Template Error: File Inclusion';
            }
        }
    }

    public function __get($key)
    {
        return $this->vars[$key];
    }

    public function __set($key, $value)
    {
        $this->vars[$key] = $value;
    }

    public function __toString()
    {
        extract($this->vars);

        chdir(dirname($this->template));

        ob_start();

        include basename($this->template);

        return ob_get_clean();
    }
}