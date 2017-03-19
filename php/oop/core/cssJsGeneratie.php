<?php

namespace Core;

class gen{

    public $linkJs;
    public $linkCss;

    public function __construct()
    {
        foreach (glob('../public/css/*.css') as $css){

            $locatie =  str_replace('../public/', '', $css);
            $this->linkCss = "<link rel='stylesheet' href='${locatie}'>";

        }

        foreach (glob('../public/js/*.js') as $js){

            $locatie = str_replace('../public/', '', $js);
            $this->linkJs = "<script src='${locatie}'></script>";

        }

    }

}

$gen = new gen();