<div class="row addgame">
	<h2>Add a new Game here</h2>
	<form method="post" action="includes/insertgame.php">
		<div class="form-group">
    		<label>Ime igre:</label>
    		<input type="text" class="form-control" name="ime">
 		</div>
 		<div class="form-group">
    		<label>Opis:</label>
    		<textarea type="text" class="form-control" name="desc"></textarea>
 		</div>
 		<div class="form-group">
    		<label>Izbaceno:</label>
    		<input type="date" class="form-control" name="date" value="<?php echo date('d-M-Y'); ?>">
 		</div>
        <div class="form-group">
            <label>Slika link:</label>
            <input type="text" class="form-control" name="img">
        </div>
 		<div class="form-group">
    		<label>Cena:</label>
    		<input type="text" class="form-control" name="cena">
 		</div>
 		<div class="form-group">
    		<label>Zanr:</label>
    		<select class="form-control" name="genre">
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
    		<select class="form-control" name="dev">
    		<?php 
    			$query = $connect->query("SELECT * FROM developer");
				while($r = $query->fetch_assoc()){
					echo "<option class='form-control' value='".$r["id"]."'>".$r["name"]."</option>";
				}
    		 ?>
    		 </select>
 		</div>
 		<dir class="form-group">
 			<button class="btn">Submint</button>
 		</dir>
	</form>
</div>