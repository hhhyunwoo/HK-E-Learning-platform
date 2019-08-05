<?php
include 'connect.php';

Class Database{
	public $host = DB_HOST;
	public $user = DB_USER;
	public $pass = DB_PASS;
	public $dbname = DB_NAME;

	public $conn;
	public $error;

	function __construct(){
		$this->connectionDb();
	}

	function connectionDb(){
		$this->conn = new Mysqli($this->host,$this->user,$this->pass,$this->dbname);

		 mysqli_set_charset($this->conn,'utf8');
		if ($this->conn) {


		}else{
			$this->error = "Connection error" .$this->conn->connect_error;
			return false;
		}
	}
	function queryHewleh($query){
		$vrdvn = $this->conn->query($query);

		if($vrdvn->num_rows>0){
			return $vrdvn;

		}else{
			return ;
		}
	}
		function queryinsert($query){

	 		if(mysqli_query($this->conn,$query)) {
	 			return true;
	 		}else{
	 			echo mysqli_error($this->conn);
	 		}

	 		}

	 function querydelete($query){

	 if(mysqli_query($this->conn,$query)) {
	 	return true;
	 	}else{
	 	echo mysqli_error($this->conn);
	 		}
	 	}
	
}


?>