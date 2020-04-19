<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;



class Main extends Model{

	
	public function getTasks($sort_direction = '', $sort_order = 'author'){
		$this->db = new Db;

		$result = $this->db->row("SELECT id, author, email, description, done   FROM tasks ORDER BY $sort_order $sort_direction;");
		
		
		
		return $result;

	}

	
}