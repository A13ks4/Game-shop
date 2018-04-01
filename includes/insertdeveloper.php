<?php
	include_once "defines.php";

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$ime = check($connect,$_POST["ime"]);
		$desc = check($connect,$_POST["desc"]);
		$logo = check($connect,$_POST["logo"]);

		$sql = "INSERT INTO developer (name,description,logo) VALUES (?,?,?)";
		$query = $connect->prepare($sql);
		$query->bind_param("sss", $ime, $desc, $logo);
		$query->execute();

	}
	header("location: ../index.php");
?>