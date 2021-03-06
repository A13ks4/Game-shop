<?php 
	include_once "defines.php";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$id = check($connect,$_POST["id"]);
		$ime = check($connect,$_POST["ime"]);
		$desc = check($connect,$_POST["desc"]);
		$date = check($connect,$_POST["date"]);
		$img = check($connect,$_POST["img"]);
		$cena = check($connect,$_POST["cena"]);
		$genre = check($connect,$_POST["genre"]);
		$dev = check($connect,$_POST["dev"]);

		$sql = "UPDATE game SET name = ?, description = ?, release_date= ?, img = ?, cena = ?, id_developer = ?, id_genre = ? WHERE id = '$id'";
		$query = $connect->prepare($sql);
		$query->bind_param("ssssiii", $ime, $desc, $date, $img, $cena,$dev,$genre);
		$query->execute();

	}
	header("location: ../index.php?pages=browsall");
 ?>