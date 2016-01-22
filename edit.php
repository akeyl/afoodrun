<?php

include "header.php";

  if (isset($_POST['update'])) {

$location = $_POST['location'];


  $check_user=mysql_query("SELECT * FROM users WHERE userid='$userid'");
  $get_check= mysql_fetch_array($check_user);

$type = $get_check['type'];



if ($type == "vendor") {
$update = "UPDATE users SET location ='".$location."' WHERE userid='".$userid."' ";
$result = mysql_query($update);

$update = "UPDATE ".$userid."_vendors SET location ='".$location."' WHERE ID='1' ";
$result = mysql_query($update);
}
if ($type == "client") {
$update = "UPDATE users SET location ='".$location."' WHERE userid='".$userid."' ";
$result = mysql_query($update);

$update = "UPDATE ".$userid."_clients SET location ='".$location."' WHERE ID='1' ";
$result = mysql_query($update);
}
if ($type == "driver") {
$update = "UPDATE users SET location ='".$location."' WHERE userid='".$userid."' ";
$result = mysql_query($update);

$update = "UPDATE ".$userid."_drivers SET location ='".$location."' WHERE ID='1' ";
$result = mysql_query($update);
}


}


?>    <div class="container">
  




        <div class="col-lg-4">
</div>

        <div class="col-lg-4">

<div style="height: 10px;"> </div>

      <form class="form-signin" action="" method="post"> 

        <input type="first" name="location" id="1" class="form-control" placeholder="Location" value="<?php 


  $check_user=mysql_query("SELECT * FROM users WHERE userid='$userid'");
  $get_check= mysql_fetch_array($check_user);

  $location=$get_check['location'];
 echo $location;
  ?>" required="">

<div style="height: 10px;"> </div>
      <div style="height: 10px;"> </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="update"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> Save Edit</button>
  <div style="height: 10px;"> </div>

    </form>

</div>
        <div class="col-lg-4">
</div>



  </div>
      <?php
include "footer.php";
?>
