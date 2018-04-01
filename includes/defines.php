<?php 
	
	define("HOST", "localhost");
	define("NAME", "root");
	define("PASS", "");
	define("DB", "goodnewgames");

	$connect = new mysqli(HOST, NAME, PASS, DB);
	if($connect->connect_error){
			die("Connection failed: ".$conn->connect_error);
		}

	function check($connect,$data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		$date = mysqli_real_escape_string($connect,$data);
		return $data;
	}

	function isLoged(){
		if(isset($_SESSION["logedin_user"])){
			return true;
		}
		return false;
	}

	function isAdmin($result){
		if(isLoged() && $result["level"] == 3){
			return true;
		}
		return false;
	}
 ?>