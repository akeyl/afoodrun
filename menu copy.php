<?php 


  if(isset($_COOKIE['iA'])) {
    $userid = $_COOKIE['iA'];
    $encrypt = $_COOKIE['uB'];

    $check = mysql_query("SELECT * FROM users WHERE userid = '$userid'")or die(mysql_error());

      $gettype=mysql_fetch_array($check);
      $posttype = $gettype['type'];

$profile_id = "";
  }else {
$userid = "";
$profile_id = "";
  }
?>


<?php
if($userid == $profile_id){
?>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>  
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="signup.php">Signup</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="index.php" >Login </a></li>
 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<?php
}
else {
if($userid == ""){
 
}
else { 

  ?>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="dashboard.php">Home</a></li>






<?php

if ($posttype == "vendor") {
  echo "";
  ?>

            <li><a href="vendor-page.php?vid=<?php echo $userid;?>">Profile</a></li>
            <li><a href="vendoradd.php">Edit to Menu</a></li>
            <li><a href="#">Open Orders</a></li>
            <li><a href="#">Closed Orders</a></li>
            <li><a href="#">Add Drivers</a></li>
  <?php
}
if ($posttype == "client") {
  ?>

            <li><a href="#">Edit Profile</a></li>
            <li><a href="#">Group Order</a></li>
            <li><a href="#">Lookup Order</a></li>
  <?php
}
if ($posttype == "driver") {
  ?>

            <li><a href="#">Edit Profile</a></li>
            <li><a href="#">Track Order</a></li>
            <li><a href="#">Close Order</a></li>
            <li><a href="#">Lookup Venders</a></li>
  <?php
}


?>





          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php if ($posttype == "driver") { echo "Driver";} if ($posttype == "client") { echo "Client";} if ($posttype == "vendor") { echo "Vendor";} ?></a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


<?php
}
}
?>