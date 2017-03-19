<?php

use App\Content;
use App\Image;
use Core\Controller;
use Core\DB;

class Admin extends Controller
{
    protected $content;
    protected $gallerij;
    public $database;

    public function __construct()
    {
        parent::__construct();
        $this->content = new Content();
        $this->database = new DB();
        $this->gallerij = new Image();
    }

    public function index()
    {
        $content = $this->content->getContent();
        $images = $this->gallerij->getImages();

        if (isset($_COOKIE['admin']) && $_COOKIE['admin'] == 'ok43563425124235231243'){
            return view('adminIndex', ['content' => $content, 'images' => $images]);
        }else{
            die(header('Location: /login'));
        }
    }

    public function create()
    {
        $this->database->create('content', [
            'content' => $_POST['content'],
        ]);

        return header('Location: /admin');
    }

    public function update($id)
    {
        $this->database->update('content','id = '.$id, [
            'content' => $_POST['content'],
        ]);

        return header('Location: /admin');
    }

    public function delete($id)
    {
        $this->database->delete('content','id = '.$id);

        return header('Location: /admin');
    }

    public function logout()
    {
        setcookie('admin', 'Nee', time() + 3600, "/");

        return header('Location: /home');
    }

    public function delImage($image)
    {
        if (isset($image)){
            unlink('../public/images/'. $image);
            return header('Location: /admin');
        }
    }
}