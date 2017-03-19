<?php

namespace App;

use Core\DB;
use Core\Model;

class Image extends Model
{
    public function getImages()
    {

        return array_diff(scandir('../public/images'), ['.', '..']);
    }
}