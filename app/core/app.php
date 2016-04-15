<?php

class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->urlFormatter();

        #print_r($url);
        
        // configure the controller
        if (file_exists('../app/controllers/'.$url[0].'.php'))
        {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/'.$this->controller.'.php';

        $this->controller = new $this->controller;

        // configure the method
        if (isset($url[1]) && method_exists($this->controller, $url[1]))
        {
            $this->method = $url[1];
            unset($url[1]);
        }
        
        // configure parameters
        $this->params = $url ? array_values($url) : [];
        
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function urlFormatter()
    {
        $url = $_GET['url'];
        /*
         * remove trailing slashes, validate for stanitize url & then explode
         * */
        return explode('/', filter_var(rtrim($url,'/'), FILTER_SANITIZE_URL));
    }
}