<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include __DIR__ . '/application/lib/dev.php';

use \application\core\Router;

//автозагрузка классов
spl_autoload_register(function ($class) {
	$path = str_replace('\\', '/', $class. '.php');
	if(file_exists($path)){
			require $path;
	}
});


session_start();

//session_unset();
//reset_cookie(); // убираем куки кроме сессионного

//создаем роутер и запускаем его


$router = new Router;
$router->run();