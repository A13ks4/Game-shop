<?php 
	include_once "defines.php";
	include_once "sesion.php";
	
	if($_SERVER["REQUEST_METHOD"] == "POST" && isLoged()){

		$id = check($connect,$_POST['id']);
		$user = $result['id'];

		$sql = "SELECT * from cart where cart.id_user = $user and cart.id_game = $id";
		$res = $connect->query($sql);
		if(mysqli_num_rows($res) >= 1){
			echo "!";
			exit();
		}
		
		$query = $connect->prepare("INSERT into cart(id_user,id_game) values (?,?)");
		$query->bind_param("ii",$user,$id);
		$query->execute();
		
		$q = $connect->query("SELECT count(id_game) as num from cart left join user on cart.id_user = user.id where cart.id_user = ".$result['id']."");
		$r = $q->fetch_assoc();
		echo $r['num'];

	}
	//header("location: ../index.php?pages=browsall");
 ?>