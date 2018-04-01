<?php
	include_once "defines.php";

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$ime = check($connect,$_POST["ime"]);

		$sql = "INSERT INTO platform (name) VALUES (?)";
		$query = $connect->prepare($sql);
		$query->bind_param("s", $ime);
		$query->execute();

	}
	header("location: ../index.php");
?>