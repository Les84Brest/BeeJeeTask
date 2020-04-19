<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;


class Task extends Model 
{
	public function addTask($author, $email, $description){
		$this->db = new Db;
		
		$sql = "INSERT INTO  `tasks` (`author`, `email`, `description`, `done`) VALUES ('$author', '$email', '$description', 0);";

		
		$this->db->query($sql);
		return true;
	}

	public function getTasks(){
		$this->db = new Db;

		$result = $this->db->row("SELECT `id`, `author`, `email`, `description`, `done`, `edited` FROM `tasks` ");

		return $result;

	}

	public function getTaskById($id){
		$this->db = new Db;
		$sql = "SELECT * FROM `tasks` WHERE id = $id;";
				
		$res = $this->db->row($sql);
		if(count($res) == 1){
			return $res[0];
		}else{
			return false;
		}
		
		

	}

	public function updateTask($id, $fields){
		$this->db = new Db;

		$sql ="UPDATE `tasks` SET ";
		foreach($fields as $key => $val){
			$sql .= "`$key` = '$val', ";
		}
		//обрезаем 2 символа т.к. они не нужны

		$sql = substr($sql, 0, strlen($sql)-2);
		$sql .= " WHERE `id` = $id;";
		
		$res = $this->db->query($sql);

		return $res;

		

	}
	

	public function deleteTask($id){
		$this->db = new Db;
		$res = $this->db->deleteById('tasks', $id);
		
		return $res;
	}

    //пометить задачу выполенн
	public function toggleDoneTask($id){
		//
	}

	public function uncompleteTask($id){
		//
	}

	//обновление задачи



}
