<?php include_once "includes/defines.php";
	  include_once("includes/sesion.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>Good New Games || Home</title>
	<link rel="shortcut icon" href="gng.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="javascript/java.js"></script>
  	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	<?php include_once("header.php"); ?>
	<div class="container">
	<?php 
		if (!empty($_GET)) {
			if(!empty($_GET['pages'])){
				$pages = $_GET['pages'];
			}
		}
		if(isAdmin($result)){
			echo "<h2>Welcome Admin <b>".$result["username"]."</b></h2>";
			?>
			<div class="row">
				<a href="?pages=addgame"><button class="btn">Game+</button></a>
				<a href="?pages=addgenre"><button class="btn">Genre+</button></a>
				<a href="?pages=adddeveloper"><button class="btn">Dev+</button></a>
			</div>
			<?php
		}
		if(!empty($pages)){
			if($pages == "addgame" && isAdmin($result)){
				include_once "pages/addgame.php";
			}
			elseif($pages == "addgenre" && isAdmin($result)){
				include_once "pages/addgenre.php";
			}
			elseif($pages == "addplatform" && isAdmin($result)){
				include_once "pages/addplatform.php";
			}
			elseif($pages == "adddeveloper" && isAdmin($result)){
				include_once "pages/adddeveloper.php";
			}elseif($pages == "browsall"){
				include_once "pages/options.php";
				?>

				<div id="brows">
				
				<?php 
				
				include_once "browsall.php";
				?></div><?php
			}
			elseif($pages == "fix" && isAdmin($result)){
				include_once "pages/editgame.php";
			}elseif($pages == "cart" && isLoged()){
				include_once "pages/cart.php";
			}elseif($pages == "game"){
				include_once "pages/buygame.php";
			}elseif($pages == "profile" && isLoged()){
				include_once "pages/profile.php";
			}else{
			include_once "pages/main.php";
			}
		}else{
			include_once "pages/main.php";
		}
	 ?>
	 	<div id="suc"></div>
	 </div>

	<?php include_once("footer.php"); ?>
</body>
</html>