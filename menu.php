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
          <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-ice-lolly-tasted" aria-hidden="true"></span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="signup.php"><span class="glyphicon glyphicon-lamp" aria-hidden="true"></span> Signup</a></li>
            <li><a href="search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</a></li>
            <li><a href="index.php" ><span class="glyphicon glyphicon-grain" aria-hidden="true"></span> Login </a></li>
 
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
          <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-ice-lolly-tasted" aria-hidden="true"></span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="dashboard.php"> <span class="glyphicon glyphicon-tent" aria-hidden="true"></span> Home</a></li>






<?php

if ($posttype == "vendor") {
  echo "";
  ?>

            <li><a href="vendoradd.php"><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> Add Items</a></li>
            <li><a href="edit.php"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Edit</a></li>
            <li><a href="vendor-page.php?vid=<?php echo $userid;?>">Profile</a></li>
  <?php
}
if ($posttype == "client") {
  ?>

            <li><a href="edit.php"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Edit</a></li>
  <?php
}
if ($posttype == "driver") {
  ?>

            <li><a href="edit.php"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Edit</a></li>
  <?php
}


?>





          </ul>
          <ul class="nav navbar-nav navbar-right">

          <?php

if ($posttype == "client") {
  echo "";
  ?>
  
  <?php
}
?>
            <li><a href="#"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span><?php if ($posttype == "driver") { echo "Driver";} if ($posttype == "client") { echo "Client";} if ($posttype == "vendor") { echo "Vendor";} ?></a></li>
            <li><a href="search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-grain" aria-hidden="true"></span> Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


<?php
}
}
?>