<?php
namespace application\core;



class View
{
	public $route;
	public $path;
	public $layout = 'default';

	public function __construct($route){
		$this->route = $route;
		$this->path = $this->route['controller'].'/'.$this->route['action'];
	}

	public static function errorCode($code){
		http_response_code($code);
		$path = 'application/views/errors/'.$code.'.php';

		if(file_exists($path)){
			require $path;
		}

		exit;
	}

	

	public static function redirect($url){
		header('Location: '.$url);
		exit;
	}

	public function render($title, $vars = []){
		extract($vars);
		$path = 'application/views/'.$this->path.'.php';
		if(file_exists($path)){
			ob_start();
			require $path;
			$content = ob_get_clean();

			require 'application/views/layouts/'.$this->layout.'.php';
		}else{
			echo 'представление не найдено';
		}

	}

	//рендерит view по имени
	public function renderNamedView($view_name, $vars = []){
		extract($vars);
		$path = 'application/views/'.$this->route['controller'].'/'.$view_name.'.php';
		if(file_exists($path)){
			ob_start();
			require $path;
			$content = ob_get_clean();

			require 'application/views/layouts/'.$this->layout.'.php';
		}else{
			echo 'представление не найдено';
		}
		
	}


}
