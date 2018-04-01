<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-left" href="index.php"><img src="gng.png" width="50" height="50"></a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="index.php">Home</a></li>
      <li><a href="?pages=browsall">Brows all</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php if(!isLoged()){ ?>
        
        <li><a href="#" data-toggle="modal" data-target="#register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      
      <?php 
        }else{
            
            ?>
            <li><a href="?pages=cart"><span class="glyphicon glyphicon-shopping-cart cart"> 
            <?php $q = $connect->query("SELECT count(id_game) as num from cart left join user on cart.id_user = user.id where cart.id_user = ".$result['id']."");
                    $r = $q->fetch_assoc();
                    echo $r['num'];?>
            </span></a></li>
            <li><a href="?pages=profile&id=<?php echo $result['id']; ?>"><span><?php echo $result["ime"];?></span></a></li>
            <li><a href="includes/logout.php">Logout</a></li>

        <?php } ?>
      </ul>
  </div>
</nav>
<!-- Modal -->
    <div class="modal fade" id="login" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Login Header</h4>
          </div>
          <div class="modal-body">
            <form name="login" action="includes/login.php" method="post">
              <label>Username:</label>
              <input type="text" name="user" class="form-control"></input>
              <label>Password:</label>
              <input type="password" name="pass" class="form-control"></input>
              <input type="submit" class="btn btn-default" value="login">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="register" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Register Header</h4>
          </div>
          <div class="modal-body">
           <form name="login" action="includes/register.php" method="post">
              <label>Ime:</label>
              <input type="text" placeholder="Ime.." name="ime"  class="form-control"></input>
              <label>Username:</label>
              <input type="text" placeholder="Username.." name="user" class="form-control"></input>
              <label>Email:</label>
              <input type="email" placeholder="Email.." name="email" class="form-control"></input>
              <label>Password:</label>
              <input type="password" placeholder="Pasword.." name="pass" class="form-control"></input>
              <input type="submit" class="btn btn-default" value="register">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>