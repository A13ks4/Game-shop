<?php 
	require_once "defines.php";
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$uname = check($connect,$_POST["user"]);
		$pass = sha1(check($connect,$_POST["pass"]));

		
		$stm = $connect->prepare("SELECT username, pass FROM user WHERE username= ? and pass= ?");
		$stm->bind_param("ss", $uname, $pass);
		$stm->execute();

		$stm->store_result();
		$stm->bind_result($n,$p);
		$stm->fetch();
		if($stm->num_rows == 1){
			$_SESSION["logedin_user"] = $n;
			header("location: ../index.php");
		}else{
			header("location: ../index.php");
		}
		echo "LOgin ".$n.$stm->num_rows;
		$stm->close();
		$connect->close();
	}else{
		echo "not post";
	}
?>