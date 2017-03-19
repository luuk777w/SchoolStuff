<?php

class App
{

    protected $controller = 'home';
    protected $method = 'index';
    protected $parameters = [];
    protected $a = 0;

    public function __construct()
    {
        $url = $this->Url();

        if(file_exists('../app/controllers/'. $url[0] .'.php')){

            $this->controller = $url[0];
            unset($url[0]);
        } else {
            if (isset($url[0]))
            die(view('error404'));
        }

        require_once '../app/controllers/'. $this->controller .'.php';

        $this->controller = new $this->controller;

        if (isset($url[1])){
            if (method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }else{
                die(view('error404'));
            }
        }

        $this->parameters = $url ? array_values($url) : [''];

        echo call_user_func_array([$this->controller, $this->method], $this->parameters);

    }

    public function Url()
    {
        if(isset($_GET['url'])){
            $url = filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);
            $exploded_url = explode('/', $url);
            return $exploded_url;
        }
    }
}