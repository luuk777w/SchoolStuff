<?php

namespace Core;

class Controller
{
    public $database;

    function __construct()
    {

        $this->database = new DB();

        foreach (glob('../app/models/*.php') as $model){

            require_once $model;

        }
    }

//    public function view($view, $data = [])
//    {
//        require_once '../app/views/'. $view . '.php';
//
//    }


}