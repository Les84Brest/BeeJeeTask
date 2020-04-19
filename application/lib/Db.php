<?php

namespace application\lib;

use PDO;

class Db
{
	protected $db;

	public function __construct(){
		$config = require 'application/config/db.php';
		$connect_db = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
		$this->db = new PDO($connect_db, $config['user'], $config['password']);
	}
	public function query($sql){
		$query = $this->db->query($sql);
		return $query;
	}
	
	public function deleteById($table, $id){
		
		$sql = "DELETE FROM $table WHERE `id`= $id ;";
		$result = $this->db->exec($sql);
	
		return $result *1;
	}


	public function row($sql){
		
		$result = $this->query($sql);
		return $result->fetchAll(PDO::FETCH_ASSOC);
		
	}

	public function column($sql){
		$result = $this->query($sql);
		return $result->fetchColumn();
	}
}
