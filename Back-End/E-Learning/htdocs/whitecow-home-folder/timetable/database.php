<?php

Class Database{

	public $conn;
	public $error;

	function __construct(){
		$this->connectionDb();
	}

	function connectionDb(){

       $this->conn =new mysqli('localhost', 'online', 'Go876InFoSys!123','online');

		if ($this->conn) {

		}else{
			echo "fail";
            $this->error = "Connection error" .$this->conn->connect_error;
			return false;
		}
        mysqli_set_charset($this->conn,'utf8');

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
