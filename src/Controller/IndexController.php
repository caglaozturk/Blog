<?php
namespace BigBear\Controller;

use BigBear\System\{AdminController,Loader};

class IndexController extends AdminController
{
    public function index(){
        $this->render('dashboard');
    }
}
