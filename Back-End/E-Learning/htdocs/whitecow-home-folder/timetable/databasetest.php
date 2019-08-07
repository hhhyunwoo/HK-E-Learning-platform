<?php
//include 'connect.php';

Class Databasetest{
/*	public $host = DB_HOST;
	public $user = DB_USER;
	public $pass = DB_PASS;
	public $dbname = DB_NAME;
*/
	public $conn;
	public $error;

	function __construct(){
		$this->connectionDb();
	}

	function connectionDb(){
	//	$conn = new Mysqli($this->host,$this->user,$this->pass,$this->dbname);
      //	$conn = new mysqli('124.158.108.146','online','Go876InFoSys!123','online');
       $this->conn =new mysqli('localhost', 'online', 'Go876InFoSys!123','online');

       /* if(mysqli_connect_errno($this->conn)){
            echo "fail" . mysqli_connect_error();
        }else{
            echo "success" ;
        }

       if($conn->connect_error){
            echo "Error0000";
        }
*/
		if ($this->conn) {
            //echo "success";
            //$this->error = "connection sucesss" .$this->conn->connect_error;
    
		}else{
			echo "fail";
            $this->error = "Connection error" .$this->conn->connect_error;
			return false;
		}
        mysqli_set_charset($this->conn,'utf8');

		echo $sql="SELECT * FROM lesson1111111111111111";

		if ($result = $this->conn->query('SELECT * FROM lesson')) {
    // 레코드 출력
    while ($row = $result->fetch_object()) {
        echo $row->name.' / '.$row->id.'<br />';
    }
     
    // 메모리 정리
    $result->free();
}
     //mysqli_set_charset($this->conn,'utf8');

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
