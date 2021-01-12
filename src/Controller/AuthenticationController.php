<?php
namespace BigBear\Controller;

use BigBear\System\Controller;
use BigBear\System\Loader;

class AuthenticationController extends Controller
{
    public function view()
    {
        $user = $this->getUser();
        if ($user){
            $this->redirect('/');           
        }
        $this->render('login');
    }

    public function login()
    {
        $username = $this->input->get('username');
        $password = $this->input->get('password');
        if (empty($username)) {
            $this->flashMessage('danger', 'Please enter username!');
            $this->redirect('/login');
        }
        if (empty($password)) {
            $this->flashMessage('danger', 'Please enter password!');
            $this->redirect('/login');
        }

        $userModel = Loader::loadModel('User');
        $user = $userModel->getUserByCredentials($username, md5($password));
        if ($user) {
            $this->session->set('logged_in', true);
            $this->session->set('userId', $user['user_id']);
        } else {
            $this->flashMessage('danger', 'Invalid username or password');
        }
        $this->redirect('/login');
    }

    public function logout()
    {
        unset($_SESSION['logged_in']);
        unset($_SESSION['userId']);
        $this->redirect('/login');
    }

    public function create()
    {
        $model = Loader::loadModel('User');
        try {
            var_dump($model->createUser('kaansef', md5('12345')));
        } catch (\Exception $e) {
            var_dump($e);
        }
    }
}
