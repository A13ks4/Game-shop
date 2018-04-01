<?php 
	$id = check($connect,$_GET['id']);
	$query = $connect->query("SELECT game.id as gid, game.name, rating, game.description as gdesc, cena, img, genre.name as gname, developer.name as dname from game 
		left join developer on game.id_developer = developer.id left join genre on game.id_genre = genre.id where game.id = $id");
	$res = $query->fetch_assoc();
 ?>
<div class="row game-page">
	<img src="<?php echo $res['img']; ?>" width="66%" height="460px" style="float: left; box-shadow: 4px 4px 14px black">
	
		<div class="buy-panel">
			<p><span class="glyphicon glyphicon-eur"></span> <?php echo $res['cena'] ?></p>
			<button class="btn" onclick="addtocart(<?php echo $res['gid']; ?>)"><span class="glyphicon glyphicon-shopping-cart"></span>add to cart</button>
			<hr>
			<p><span class="glyphicon glyphicon-ok"></span> DRM-FREE. No activation or online connection required to play.</p>
			<p><span class="glyphicon glyphicon-ok"></span> MONEY BACK GUARANTEE. 30 days coverage after purchase.</p>
		</div>
		<div class="game-desc">
			<h2><?php echo $res['name']; ?></h2>
			
			
			<p>
				<span>Developed by <u><?php echo $res['dname']; ?></u></span>
				<span> | <?php echo $res['gname']; ?>  | rating </span>
				<span class="glyphicon glyphicon-star" style="<?php if($res['rating']<2){ echo 'color:red;'; } elseif($res['rating']<4){ echo 'color:orange;'; }else{ echo 'color:green;'; } ?>"><?php echo $res['rating']; ?></span>
			</p>
			<hr>
			<h5>DESCRIPTION</h5>
			<p><?php echo $res['gdesc']; ?></p>
		</div>
		
		<div class="review">
			<?php if(isLoged()){ ?>
				<button class="btn" data-toggle="modal" data-target="#review">Review+</button>
			<?php } ?>
			<hr>
			<h4>USER REVIEWS</h4>
			<?php 
				$query = $connect->query("SELECT title, description, ocena, user.username from review left join user on review.id_user = user.id where review.id_game = ".$res['gid']."");
				while($r = $query->fetch_assoc()){
			 ?>
			 	<h5>By <u><?php echo $r['username']; ?></u> <?php echo $r['title']; ?> || rating <span class="glyphicon glyphicon-star"><?php echo $r['ocena']; ?></span></h5>
			 	<p><?php echo $r['description'] ?></p>
			 	<hr>
			 	<?php } ?>
		</div>
		
		
		<!-- Modal -->
		    <div class="modal fade" id="review" role="dialog">
		      <div class="modal-dialog">
		      
		        <!-- Modal content-->
		        <div class="modal-content">
		          <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal">&times;</button>
		            <h4 class="modal-title">Add your review here</h4>
		          </div>
		          <div class="modal-body">
		            <form name="review" action="includes/review.php" method="post">
		              <input type="hidden" name="id" class="form-control" value="<?php echo $res['gid']; ?>"></input>
		              <label>Title:</label>
		              <input type="text" name="title" class="form-control"></input>
		              <label>Your review:</label>
		              <textarea type="text" name="description" class="form-control"></textarea>
		              <label>Rating:</label>
		              <input type="number" name="rating" min="1" max="5" value="1" class="form-control"></input>
		              <input type="submit" class="btn btn-default" value="review">
		            </form>
		          </div>
		          <div class="modal-footer">
		            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		          </div>
		        </div>
		        
		      </div>
		    </div>
		<style type="text/css">
		body{
			background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 1)), url("<?php echo $res['img']; ?>");
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
		}
		</style>
	
</div>