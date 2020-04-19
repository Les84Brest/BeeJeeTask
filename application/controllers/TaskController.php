<?php
namespace application\controllers;

use application\core\Controller;
use application\core\Model;
use application\lib\Paginator;

class TaskController extends Controller 
{

	

	public function addAction(){
		$this->view->render('Ввести задачу');

	}

	//обрабатываем инфу после добавления таска
	public function addingtaskAction(){
		
		$author = htmlspecialchars($_POST['author']);
		$email = htmlspecialchars($_POST['email']);
		$description = trim(htmlspecialchars($_POST['description']));
		

		if($this->model->addTask($author, $email, $description )){
			$this->view->renderNamedView('success', ['title' => ' ']);
		}
	}

	public function listAction(){
		//проверка залогиненности пользователя
		
		$this->checkAuth();
		if((!isset($_SESSION['logined'])) || !$_SESSION['logined']){
			header('Location: /');
		}

		$tasks = $this->model->getTasks();

		//занимаемся пагинацией
		
		$this->paginator = new Paginator($tasks, 3);
		$page = 0; // страница
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}
		
		if(isset($_GET['page'])){
			$items_to_show = $this->paginator->getItemsByPageNumber($_GET['page']);
		} else{
			$items_to_show = $this->paginator->getItemsByPageNumber(0);
		}

		$items_to_show = $this->paginator->getItemsByPageNumber($page);
	
		$vars = [
			'tasks' => $items_to_show
		];
		//решение вопросов с отображением пагинатора если задач меньше установленного кол-ва
		if((count($items_to_show) < $this->paginator->getShowCount()) ) {
				
			if($page!=0) {
				$vars['paginator'] = $this->paginator;
			}
		}elseif(count($tasks) > $this->paginator->getShowCount()){
			$vars['paginator'] = $this->paginator;
		}
		


		$this->view->render('Управление задачами', $vars);
	}

	public function deleteAction(){
		//проверяем авторизацию
		$this->checkAuth();
	 	

		$task_id = $_GET['id'];
		$res = $this->model->deleteTask($task_id);
		
		
			$this->view->renderNamedView('delete_success', ['title' => '']);
		
	}
	public function editAction(){
		//проверяем авторизацию
		$this->checkAuth();
	

		$task_id = $_GET['id'];
		$model = $this->model->getTaskById($task_id);
		$this->view->render('Редактирование задачи', $model);


	}
	public function editingtaskAction(){

		//проверяем авторизацию
		$this->checkAuth();

	debug($_POST);
		$id = (int)htmlspecialchars($_POST['id']);
		$author = htmlspecialchars($_POST['author']);
		$email = htmlspecialchars($_POST['email']);
		$description = trim(htmlspecialchars($_POST['description']));
		$done = trim(htmlspecialchars($_POST['done'])) == '' ? false : true;
		$edited = trim(htmlspecialchars($_POST['edited'])) == '' ? false : true;
	

		$task_fields = [
			'author' => $author,
			'email' => $email,
			'description' => $description,
			'done'=> $done,
			'edited' => $edited 
		];
		
		$saved_task = $this->model->getTaskById($id);
		
		if(strcmp($description, $saved_task['description']) != 0){
			$task_fields['edited'] = true;
			$this->model->updateTask($id, $task_fields);

			$this->view->renderNamedView('update_success', ['title' =>' ', 'msg' => 'Cохранено успешно']);
		}else{
			$this->view->renderNamedView('update_success', ['title' =>' ', 'msg' => 'Описание задачи не изменилось']);
		}
			

	}

	/**проверка залогиненности пользователя */
	private function checkAuth(){
		
		if((!isset($_SESSION['logined'])) || !$_SESSION['logined']){
			header('Location: /');
		}
	}

	

}
