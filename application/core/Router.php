<?php
namespace application\core;

class Router  
{
	protected $routes;
	protected $params;

	public function __construct(){
				
		$arr = require  $_SERVER['DOCUMENT_ROOT'] . '/application/config/routes.php';
		
		foreach($arr as $key => $val){
			$this->add($key, $val);
		}
		
	}

	/*добавление путей подготовка рег выражения*/

	public function add($route, $params){
		$route = '#^'.$route.'$#';
		$this->routes[$route] = $params;
	}

	public function match(){
		$url = trim($_SERVER['REQUEST_URI'], '/');
		
		//готовим строку на случай передачи GET параментра в экшн
	
		$get_pos = strpos($url,'?');
		
	
		if(!$get_pos === false || $get_pos === 0 ){ // если 0 значит корень сайта
			//возвращаем строку не считая позиции ввода и ?

			$url =substr($url,0, $get_pos); 	
			
		}
		
		
		
		foreach ($this->routes as $route => $params) {
			if(preg_match($route, $url, $matches)){
				$this->params = $params;
				
				return true; //match found;
			}
		}

		return false; // nothing vas found
	}

	public function run(){
		if($this->match()){ 
			$path = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
			
			if(class_exists($path)){
				$action = $this->params['action'].'Action';
				if (method_exists($path, $action)) {
					$controller = new $path($this->params);
					$controller->$action();
				} else {
					View::errorCode(404);
				}
				
			}else{
				View::errorCode(404);
			}
		}else{
			View::errorCode(404);
		} 
		
	}
}
