<?php

use App\User;
use App\Menu;
use Core\Controller;
use Core\DB;

class Login extends Controller
{
    protected $user;
    protected $menu;

    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
        $this->menu = New Menu();
    }

    public function index()
    {
        $menu = $this->menu->getMenu();
        return view('login', ['menu' => $menu]);
    }

    public function login()
    {
        $password = $this->user->login($_POST['email']);

        if ($_POST['password'] == $password){
            setcookie('admin', 'ok43563425124235231243', time() + 3600, "/");
            return redirect('/admin');
        } else {
            setcookie('admin', 'Nee', time() + 3600, "/");
            return redirect('/login');
        }
    }

}