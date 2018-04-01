<?php 
	include_once "defines.php";

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		if(!empty($_POST["ime"]) && !empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['email'])){
				$ime = check($connect,$_POST["ime"]);
				$uname = check($connect,$_POST['user']);
				$pass = sha1(check($connect,$_POST['pass']));
				$email = check($connect,$_POST['email']);
				$sql = "INSERT INTO user (ime,username,email,pass) VALUES (?,?,?,?)";
				$query = $connect->prepare($sql);
				$query->bind_param("ssss", $ime, $uname, $email, $pass);
				$query->execute();
				echo "sucess";
				header("location: ../index.php?pages=prifile");
			}else{echo "all fields are required";exit();}
	}else{
		header("location: ../index.php");
	}

 ?>