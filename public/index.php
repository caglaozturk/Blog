<?php 
ini_set('display_errors', 1);
setlocale(LC_TIME, 'tr_TR');
session_start();
include '../vendor/autoload.php';
use BigBear\System\Router;
include '../routes.php';

Router::dispatch($_SERVER);
