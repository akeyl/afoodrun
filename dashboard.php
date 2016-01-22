
<?php include "header.php"; ?>



<?php



if ($posttype == "vendor") {
  include "vendor.php";
}
if ($posttype == "client") {
  include "client.php";
}

if ($posttype == "driver") {
  include "driver.php";
}


?>



<?php include "footer.php"; ?>