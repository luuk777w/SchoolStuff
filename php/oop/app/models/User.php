<?php

namespace App;

use Core\DB;
use Core\Model;

class User extends Model
{

    public function name()
    {
        return "hallo";
    }

    public function login($email)
    {
        $sql = $this->database->read('users', 'WHERE email = "'.$email.'"');

        $iets = '';

        foreach (json_decode($sql) as $rows){
            $iets .= $rows->password;
        }

        return $iets;
    }

}