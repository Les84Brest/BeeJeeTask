<?php
namespace application\controllers;

use  application\core\Controller;
use application\core\Model;
use application\lib\Paginator;


/*Управление отображением тасков*/

class MainController extends Controller 
{
	public function indexAction(){
		if(isset($_COOKIE['sort_criterie'])){

			$sort_criterie = unserialize($_COOKIE['sort_criterie']);
			$sort_direction = $sort_criterie['sort_direction'] == '' ? Model::SORT_DIRECTION_NORMAL : Model::SORT_DIRECTION_DESC;
			$tasks = $this->model->getTasks($sort_direction, $sort_criterie['sort_item']);

		}else{
			$tasks = $this->model->getTasks(Model::SORT_DIRECTION_NORMAL );
		}
//занимаемся пагинацией
		$this->paginator = new Paginator($tasks, 3);
		$page = 0; // страница
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}
		$items_to_show = $this->paginator->getItemsByPageNumber($page);
	
		$vars = [
			'tasks' => $items_to_show
		];
		
		// передаем пагинатор view
		
		if((count($items_to_show) < $this->paginator->getShowCount()) ) {
				
			if($page!=0) {
				$vars['paginator'] = $this->paginator;
			}
		}elseif(count($tasks) > $this->paginator->getShowCount()){
			$vars['paginator'] = $this->paginator;
		}

		$this->view->render('Главная страница', $vars);

	}
	
	public function sortauthorAction(){
		//по умолчанию сортировка по автору
		//устанавливаем сортировку наоборот т.к. это нужно для интерфейса
		
		
		
		//сookie для текущей сортировки
		setcookie('sort_criterie', serialize(['sort_item'=> 'author', 'sort_direction' => '']), time()+3600, '/');

		//сookie для настройки сортировки в интерфейсе
		setcookie('sort_bind', serialize(['sort_item'=> 'byname', 'sort_direction' => 'desc']), time()+3600, '/');

		header("Location: /"); //редирект на главную	

	}

	public function sortauthordescAction(){

		//сookie для текущей сортировки
		setcookie('sort_criterie', serialize(['sort_item'=> 'author', 'sort_direction' => 'desc']), time()+3600, '/');

		setcookie('sort_bind', serialize(['sort_item'=> 'byname', 'sort_direction' => '']), time()+3600, '/');

		header("Location: /"); //редирект на главную
		

	}

	//по email

	public function sortemailAction(){

		//сookie для текущей сортировки
		setcookie('sort_criterie', serialize(['sort_item'=> 'email', 'sort_direction' => '']), time()+3600, '/');
		
		//сookie для настройки интерфейса
		setcookie('sort_bind', serialize(['sort_item'=> 'byemail', 'sort_direction' => 'desc']), time()+3600, '/');

		header("Location: /"); //редирект на главную
	}
	public function sortemaildescAction(){

		//сookie для текущей сортировки
		setcookie('sort_criterie', serialize(['sort_item'=> 'email', 'sort_direction' => 'desc']), time()+3600, '/');

		//сookie для настройки интерфейса
		setcookie('sort_bind', serialize(['sort_item'=> 'byemail', 'sort_direction' => '']), time()+3600, '/');

			header("Location: /"); //редирект на главную
	}

	//по выполнению
	public function sortdoneAction(){

		//сookie для текущей сортировки
		setcookie('sort_criterie', serialize(['sort_item'=> 'done', 'sort_direction' => '']), time()+3600, '/');

	
		//сookie для интерфейса
		setcookie('sort_bind', serialize(['sort_item'=> 'bydone', 'sort_direction' => 'desc']), time()+3600, '/');

		header("Location: /"); //редирект на главную

	}
	public function sortdonedescAction(){

		//сookie для текущей сортировки
		setcookie('sort_criterie', serialize(['sort_item'=> 'done', 'sort_direction' => 'desc']), time()+3600, '/');

		//сookie для интерфейса
		setcookie('sort_bind', serialize(['sort_item'=> 'bydone', 'sort_direction' => '']), time()+3600, '/');

		header("Location: /"); //редирект на главную
	}
}
