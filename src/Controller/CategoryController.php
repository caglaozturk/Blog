<?php
namespace BigBear\Controller;

use BigBear\System\{AdminController,Loader};

class CategoryController extends AdminController{
    public function index(){
        $result = Loader::loadModel('Category');
        $response = $result->getAll();
        $this->render('listCategory', ['categories' => $response]);
    }

    public function create(){
        $this->render('addUser');
    }

    public function update(){
        $this->render('updateUser');
    }
}