<?php 

require_once __DIR__ . '/vendor/autoload.php';
use Framework\Router\Router;
use Framework\Database\DatabaseConnection;


// $router = new Router;
// echo $router->toCamelCase('admin controller');

$db = new DatabaseConnection([
    'dsn'=>"mysql:host=localhost;dbname=youtube;",
    'username'=>'root',
    'password'=>'shamad@SWE93',
    ]
);
$db->open();
var_dump($db);