<?php

// show all errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

// require stuff
if( !session_id() ) @session_start();
require_once 'vendor/autoload.php';


// constants & settings
define( 'BASE_URL', 'http://localhost/zadanie' );
define( 'APP_PATH', realpath(__DIR__ . '/../') );

// configurations
$config = [

    'db' => [
        'type'     => 'sqlsrv',
        'name'     => 'rss',
        'server'   => 'localhost',
        'username' => 'kk_pam',
        'password' => 'PAMPAMPAM',
        'charset'  => 'utf8'
    ]

];


$db = new PDO("sqlsrv:Server={$config['db']['server']};Database={$config['db']['name']}",
    $config['db']['username'], $config['db']['password']);


// global functions
require_once 'functions-general.php';
require_once 'functions-string.php';
require_once 'functions-auth.php';
require_once 'functions-post.php';


// Registration login
//require_once("vendor/PHPAuth/Config.php");
//require_once("vendor/PHPAuth/Auth.php");
//$auth_config = new PHPAuth\Config($db);
//$auth   = new PHPAuth\Auth($db, $auth_config);
//
//
//if (!$auth->isLogged()) {
//    header('HTTP/1.0 403 Forbidden');
//    echo "Forbidden";
//
//    exit();
//}

