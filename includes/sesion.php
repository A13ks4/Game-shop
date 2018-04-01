<?php 
	session_start();
	
	$result = '';
    if(isset($_SESSION["logedin_user"])){
		//header("location: index.php");
	

	

	$user = $_SESSION["logedin_user"];

	$query = $connect->query("SELECT * FROM user WHERE username = '$user'");

	$result = $query->fetch_assoc();

	}
	
	
 ?>