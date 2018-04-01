<?php 
	include_once "defines.php";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$id = check($connect,$_POST['id']);

	
		$query = $connect->prepare("DELETE from game where id = ?");
		$query->bind_param("i",$id);
		$query->execute();
		echo "success";
		

	}
	header("location: ../browsall.php");
	
 ?>