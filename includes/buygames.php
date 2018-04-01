<?php 
	include_once "defines.php";
	include_once "sesion.php";

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$query = $connect->query("SELECT game.id as gameid from cart left join user on cart.id_user = user.id left join game on cart.id_game = game.id where cart.id_user = ".$result['id']." GROUP BY game.id");
		while ($res = $query->fetch_assoc()) {
			$sql = "INSERT INTO bought (id_user,id_game) VALUES (?,?)";
			$q = $connect->prepare($sql);
			$q->bind_param("ii", $result['id'], $res['gameid']);
			$q->execute();
		}
		$q = $connect->query("DELETE from cart where cart.id_user = ".$result['id']."");
	}
	header("location: ../index.php")
 ?>