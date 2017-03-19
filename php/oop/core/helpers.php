<?php

if (! function_exists('view')) {

    /**
     * @param $view
     * @param array $data
     */
    function view($view, $data = [])
    {
        require_once '../app/views/'. $view . '.php';

    }
}

if (! function_exists('redirect')) {

    function redirect($to)
    {
        header('location:'.$to);

    }
}