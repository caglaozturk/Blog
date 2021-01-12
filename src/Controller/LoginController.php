<?php
namespace BigBear\Controller;

use BigBear\System\Controller;

class LoginController extends Controller
{
    public function index(){
        $this->render('login', [
            'deger' => 'Woman Developer!'
        ]);
    }
}