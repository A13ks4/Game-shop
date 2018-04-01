<?php
	include_once "defines.php"; include_once "sesion.php";

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$id = check($connect,$_POST['id']);
		$title = check($connect,$_POST["title"]);
		$desc = check($connect,$_POST["description"]);
		$rating = check($connect,$_POST["rating"]);
		$user = $result['id'];


		$sql = "INSERT INTO review (title,description,ocena,id_game,id_user) VALUES (?,?,?,?,?)";
		$query = $connect->prepare($sql);
		$query->bind_param("ssiii", $title, $desc, $rating, $id, $user);
		if($query->execute()){
			echo "Success";
		}

		if($connect->query("UPDATE game set rating = (SELECT avg(ocena) from review where review.id_game = game.id)")){
			header("location: index.php");
		}

		//$query->execute();
	}
	header("location: ../index.php?pages=browsall");
?>