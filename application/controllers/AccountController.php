<?php
namespace application\controllers;

use  application\core\Controller;
use application\core\Model;

class AccountController extends Controller 
{



	
	public function loginAction(){
		
		$vars = array();

		if(isset($_COOKIE['auth_error'])){
				$vars = ['error_msg' => $_COOKIE['auth_error'] ];
				setcookie('error_msg', '', -3600 , '/');
		}else{
			$vars = ['error_msg' => '' ];
		}

		$this->view->render("Вход", $vars);
		
	}
	
	public function checkuserAction(){
		$login = trim(strip_tags($_POST['login']));
		$password = trim(strip_tags($_POST['password']));

		$users = $this->model->getUsers();
	
		foreach ($users as $user) {
			
			if($user['login'] == (string)$login && $user['password'] == (string)$password){
				$_SESSION['logined'] = true;
				header('Location: /task/list');
				exit;
			}
			setcookie('auth_error', 'Неверный логин или пароль', time()+1500, '/');
			header("Location: /account/login");
		}
	}
	
	public function logoutAction(){
		unset($_SESSION['logined']);

		header('Location: '. $_SERVER['HTTP_REFERER']);
		
	}

	
}
