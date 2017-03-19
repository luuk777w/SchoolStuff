<?php

use App\Menu;
use App\Content;
use App\Image;
use Core\Controller;
use Core\DB;

class Gallerij extends Controller
{
    protected $menu;
    protected $gallerij;

    public function __construct()
    {
        parent::__construct();
        $this->menu = New Menu();
        $this->gallerij = New Image();
    }

    public function index()
    {
        $menu = $this->menu->getMenu();
        $images = $this->gallerij->getImages();
        return view('gallerij', ['menu' => $menu, 'images' => $images]);
    }

    public function handleImages(){
        $target_dir = "../public/images/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            return header('location: /gallerij');
        }
    }
}