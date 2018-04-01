<?php 
	include_once "includes/defines.php";
	include_once "includes/sesion.php";

	$query = $connect->query("SELECT game.name, game.img as gimg, game.cena from cart left join user on cart.id_user = user.id left join game on cart.id_game = game.id where cart.id_user = ".$result['id']." GROUP BY game.id");

?>
<div class="row">
	<div class="col-sm-9 cart-inbox">
		<?php
			$ukupno = 0;
			while($res = $query->fetch_assoc()){
				$ukupno += $res['cena'];
		?>
		<div class="row cart-row">
			<img src="<?php echo $res['gimg']; ?>" width="160" height="70">
			<h4><?php echo $res["name"]; ?></h4>
			<span class="glyphicon glyphicon-eur"><?php echo $res['cena']; ?></span>
		</div>
	<?php } ?>
	<div class="row cart-row">
		<h4>Ukupna cena: <?php echo $ukupno; ?></h4>
		<form action="includes/buygames.php" method="post">
			<button class="btn">Buy</button>
		</form>
	</div>
</div>
</div>