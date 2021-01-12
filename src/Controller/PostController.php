<?php
namespace BigBear\Controller;

use BigBear\System\{AdminController,Loader};

class PostController extends AdminController{
    public function index(){
        $result = Loader::loadModel('Post');
        $response = $result->getAll();
        $this->render('listPost', ['posts' => $response]);
    }

    public function create(){
        $this->render('addUser');
    }

    public function update(){
        $this->render('updateUser');
    }
}