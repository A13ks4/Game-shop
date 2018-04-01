
	<?php include_once "includes/defines.php"; include_once "includes/sesion.php";
		$i = 0;
		$sql = '';
		$str = '';
		if(isset($_GET['genre'])){
			$str = check($connect,$_GET['genre']);
			$sql = "SELECT game.name, game.id, img, cena, genre.name as gname, genre.id as gid from game left join genre on game.id_genre = genre.id where genre.name = '$str'";
		}elseif(isset($_GET['dev'])){
			$str = check($connect,$_GET['dev']);
			$sql = "SELECT game.name, game.id, img, cena, developer.name as dname, developer.id as did from game inner join developer on game.id_developer = developer.id where developer.name = '$str'";
		}
		else{
			$sql = "SELECT * from game";
		}
		$query = $connect->query($sql);
		while($res = $query->fetch_assoc()){
			if($i % 6 == 0){
				?><div class="row"><?php
			}
			?>
				
					<div class="col-sm-2">
						<?php if(isAdmin($result)){ ?> <a href="?pages=fix&id=<?php echo $res['id']; ?>" class="edit glyphicon glyphicon-pencil"></a> <a href="#" onclick="deletegame(<?php echo $res['id'] ?>);" class="remove glyphicon glyphicon-remove"></a> <?php } ?>
						<a href="?pages=game&id=<?php echo $res['id']; ?>">
							<div class="article">
							<img src="<?php echo $res['img'] ?>" style="width:100%" height="120">
							<p><?php echo $res["name"]; ?></p>
							<button class="btn pull-right"><span class="glyphicon glyphicon-euro"></span> <?php echo $res["cena"]; ?></button>
							</div>
						</a>
						
					</div>
				
			<?php $i++;
			if($i % 6 == 0){
				?></div><?php 
			}
		}
	 ?>
</div>