<?php
namespace BigBear\Controller;

use BigBear\System\{AdminController,Loader};

class UserController extends AdminController{
    public function index(){
        $userModel = Loader::loadModel('User');
        $users = $userModel->getAllUsers();
        $this->render('listUser', ['users' => $users]);
    }

    public function edit($id)
    {
        $request = Loader::loadModel('User');
        $response = $request->getUser($id);
        $this->render('updateUser', ['setting' => $response]);
    }

    public function create(){
        $this->render('addUser');
    }

    public function update(){
        $this->render('updateUser');
    }
}