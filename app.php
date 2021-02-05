<?php
use Online\Classes\Request;
use Online\Classes\Session;

//path & urls
define('PATH', __DIR__ . "/");
define('URL', "http://localhost/My%20Files/Online%20Shop/");

//include classes
require_once(PATH . "vendor/autoload.php");

//obj
$request = new Request;
$session = new Session;


?>