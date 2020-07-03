<?php

class connect{
	
	public $connection;
	public function __construct()
	{
		$this->connect_db();
	}
	public function connect_db()
	{ 
		$this->connection = mysqli_connect('localhost', 'root', '', 'test2');
		if(mysqli_connect_error())
		 	{
				die("Database Connection Failed" . mysqli_connect_error() . mysqli_connect_errno());
		 	}
		return $this->connection;
	}
}
?>