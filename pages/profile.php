<h3>Your games:</h3>
<?php 
	include_once "includes/defines.php";
	include_once "includes/sesion.php";

	$query = $connect->query("SELECT game.name, game.img as gimg, game.cena from bought left join user on bought.id_user = user.id left join game on bought.id_game = game.id where bought.id_user = ".$result['id']." GROUP BY game.id");

	?>

<div class="row">
	<div class="col-sm-9 cart-inbox">
	<?php
	while($res = $query->fetch_assoc()){
 ?>
 	<div class="row cart-row">
		<img src="<?php echo $res['gimg']; ?>" width="160" height="70">
		<h4><?php echo $res["name"]; ?></h4>
	</div>
	<?php } ?>
</div>
</div>