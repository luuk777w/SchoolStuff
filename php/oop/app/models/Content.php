<?php

namespace App;

use Core\DB;
use Core\Model;

class Content extends Model
{
    public function getContent()
    {
        $sql = $this->database->read('content');

        return $sql;
    }
}