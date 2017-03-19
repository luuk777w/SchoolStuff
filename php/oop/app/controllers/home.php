<?php

use App\User;
use App\Menu;
use App\Content;
use Core\Controller;
use Core\DB;

class Home extends Controller
{
    protected $menu;
    protected $content;

    public function __construct()
    {
        parent::__construct();
        $this->menu = New Menu();
        $this->content = New Content();
    }

    public function index()
    {
        $menu = $this->menu->getMenu();
        $content = $this->content->getContent();
        return view('index', ['menu' => $menu, 'content' => $content]);
    }

    public function test()
    {
        return User::name();
    }

    public function read()
    {
        $sql = $this->database->read();

        $iets = '';

        foreach (json_decode($sql) as $rows){
            $iets .= $rows->name . "<br>";
        }

        return $iets;
    }

    public function create()
    {

        $sql = $this->database->create('users', [
        'name' => 'Luuk222',
        'password' => '123222'
        ]);

        return $sql;
    }

    public function update()
    {

        $sql = $this->database->update('users','id = 36', [
            'name' => 'Luuk222',
            'password' => '123222'
        ]);

        return $sql;
    }

    public function delete()
    {
        $sql = $this->database->delete('users', 'id = 40');

        return $sql;
    }


}