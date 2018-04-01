<div class="row">
	<h4>Search by</h4>
	<div class="col-sm-3">
		<label>Genre: </label>
		<select class="form-control" name="genre" onchange="selectgame(this.value);">
		<?php 
			$query = $connect->query("SELECT * FROM genre");
			while($r = $query->fetch_assoc()){
				echo "<option class='form-control' value='".$r["name"]."'>".$r["name"]."</option>";
			}
		 ?>
		</select>
	</div>
	<div class="col-sm-3">
		<label>Developer: </label>
		<select class="form-control" name="dev" onchange="selectdev(this.value);">
			<?php 
				$query = $connect->query("SELECT * FROM developer");
				while($r = $query->fetch_assoc()){
					echo "<option class='form-control' value='".$r["name"]."'>".$r["name"]."</option>";
				}
			 ?>
		</select>
	</div>
</div>