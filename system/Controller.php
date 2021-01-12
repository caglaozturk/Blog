<?php 

namespace BigBear\System;
use BigBear\System\Helpers;

class Controller{

    private static $_variables = [];

    public $session;

    public $input;

    public $user;

    public $helper;

    public function __construct()
    {
        $userModel = Loader::loadModel('User');
        $this->session = new Session();
        $this->input = new Input();
        $this->helper = new Helpers();
        $this->user = !empty($_SESSION['logged_in']) ? $userModel->getUser($_SESSION['userId']) : null;
    }

    public function redirect($url = '/')
    {
        header('Location: ' . $url);
    }

    public function show404()
    {
        http_response_code(404);
        $this->render('error/404');
        exit;
    }

    public function flashMessages()
    {
		if (!empty($_SESSION['flashMessages'])) {
			$flashMessages = $_SESSION['flashMessages'];
			unset($_SESSION['flashMessages']);
		} else {
			$flashMessages = null;
		}
        return $flashMessages;
    }

    public function flashMessage($type, $message)
    {
        $_SESSION['flashMessages'][] = ['type' => $type, 'message' => $message];
    }

    public function getUser()
    {
        $userModel = Loader::loadModel('User');
        //print_r($userModel);echo $this->session->get('userId');exit;
        if ( !empty($this->session->get('userId')) ) {
            $user = $userModel->getUser( $this->session->get('userId') );
        } else {
            $user = null;
        }
        return $user;
    }

    public function render($view, $variables = null)
    {
        if (!self::$_variables) {
            self::$_variables = $variables;
        }

        $level = ob_get_level();

        ob_start();

        try {
            if (self::$_variables) {
                extract(self::$_variables);
                if ($variables)
                    extract($variables);
            }
            $file = $this->helper->getViewDir() . DIRECTORY_SEPARATOR . $view . '.template.php';
            if (is_file($file) && is_readable($file)) {
                include $file;
            } else {
                header('HTTP/1.1 404 Not Found');
                throw new \Exception('View file is not found!');
            }
        } catch (Exception $e) {
            while (ob_get_level() > $level) {
                ob_end_clean();
            }

            throw $e;
        }

        echo  ob_get_clean();
    }
    
}