<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;


class Account extends Model{
	

	public function getUsers(){
		$this->db = new Db;

		$result = $this->db->row("SELECT `login`, `password` FROM `users`;");

		
		
		return $result;

	}

	
}