<?php

namespace App;

use Core\DB;
use Core\Model;

class Menu extends Model
{
    public function getMenu()
    {
        $sql = $this->database->read('menu');

        return $sql;
    }
}