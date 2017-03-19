<?php

namespace Core;

class Model
{
    public function __construct()
    {
        $this->database = new DB();
    }
}