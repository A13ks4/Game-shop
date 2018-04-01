<div class="row">
	<?php 
		$query = $connect->query("SELECT * from game order by release_date desc limit 5");

	 ?>
	<h2>New games:</h2>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" style="height: 600px;">
  <?php $i = 0;
  		while($res  = $query->fetch_assoc()){
   ?>
    <div class="item <?php if($i==0){echo 'active';$i++;} ?>">
    	<h3><?php echo $res['name']; ?></h3>
    	<span class="glyphicon glyphicon-eur"> <?php echo $res['cena']; ?></span>
      <a href="?pages=game&id=<?php echo $res['id']; ?>"><img src="<?php echo $res['img']; ?>" alt="Los Angeles" width="100%" height="600"></a>
    </div>
    <?php } ?>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="row">
<h2>Best rated:</h2>
<?php
$query = $connect->query("SELECT * from game order by rating desc limit 6");
		while($res = $query->fetch_assoc()){
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

<?php } ?>
</div>
</div>