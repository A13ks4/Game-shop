
<div class="row">
	<h2>Edit here</h2>
	<?php 
		$id = check($connect,$_GET['id']);
		$query = $connect->query("SELECT * from game where id='$id'");
		$res = $query->fetch_assoc();
	 ?>
	 <form method="post" action="includes/updategame.php">
	 	<input type="hidden" name="id" value="<?php echo $res['id']; ?>"></input>
	 	<div class="form-group">
    		<label>Ime igre:</label>
    		<input type="text" class="form-control" name="ime" value="<?php echo $res['name']; ?>">
 		</div>
 		<div class="form-group">
    		<label>Opis:</label>
    		<textarea type="text" class="form-control" name="desc" ><?php echo $res['description']; ?></textarea>
 		</div>
 		<div class="form-group">
    		<label>Izbaceno:</label>
    		<input type="date" class="form-control" name="date" value="<?php echo $res['release_date']; ?>">
 		</div>
        <div class="form-group">
            <label>Slika link:</label>
            <input type="text" class="form-control" name="img" value="<?php echo $res['img']; ?>">
        </div>
 		<div class="form-group">
    		<label>Cena:</label>
    		<input type="text" class="form-control" name="cena" value="<?php echo $res['cena']; ?>">
 		</div>
 		<div class="form-group">
    		<label>Zanr:</label>
    		<select class="form-control" name="genre" value="<?php echo $res['id_genre']; ?>">
    		<?php 
    			$query = $connect->query("SELECT * FROM genre");
				while($r = $query->fetch_assoc()){
					echo "<option class='form-control' value='".$r["id"]."'>".$r["name"]."</option>";
				}
    		 ?>
    		 </select>
 		</div>
 		<div class="form-group">
    		<label>Developer:</label>
    		<select class="form-control" name="dev" value="<?php echo $res['id_developer']; ?>">
    		<?php 
    			$query = $connect->query("SELECT * FROM developer");
				while($r = $query->fetch_assoc()){
					echo "<option class='form-control' value='".$r["id"]."'>".$r["name"]."</option>";
				}
    		 ?>
    		 </select>
 		</div>
 		<dir class="form-group">
 			<button class="btn">Update</button>
 		</dir>
	 </form>
</div>