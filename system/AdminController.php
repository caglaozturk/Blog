<?php
namespace BigBear\System;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->get('logged_in') && $_SERVER['REQUEST_URI'] != '/login') {
            $this->redirect('/login');
        }
    }
}



