<?php

include "header2.php";


	if (isset($_POST['signup'])) {

		$type = $_POST['type'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$encrypt=md5($_POST['password']);

if ($type == "client") {

	$userid = time().rand();
	
	$add = "INSERT INTO users (userid, type, name, email, password, encrypt) VALUES ('".$userid."', '".$type."', '".$name."', '".$email."', '".$password."', '".$encrypt."')";
	$add_user = mysql_query($add);

	$create = "CREATE TABLE ".$userid."_clients (ID MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	cid VARCHAR(50),
	name VARCHAR(60),
	location VARCHAR(60));";
	$create_user = mysql_query($create);

	$create = "CREATE TABLE ".$userid."_orders (ID MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	oid VARCHAR(50));";
	$create_user = mysql_query($create);

	$add = "INSERT INTO ".$userid."_clients (cid, name) VALUES ('".$userid."', '".$name."')";
	$add_user = mysql_query($add);
}

if ($type == "vendor") {

	$userid = time().rand();
	
	$add = "INSERT INTO users (userid, type, name, email, password, encrypt) VALUES ('".$userid."', '".$type."', '".$name."', '".$email."', '".$password."', '".$encrypt."')";
	$add_user = mysql_query($add);

	$create = "CREATE TABLE ".$userid."_vendors (ID MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	vid VARCHAR(50),
	name VARCHAR(60),
	location VARCHAR(60),
	about VARCHAR(60),
	oid VARCHAR(60));";
	$create_user = mysql_query($create);

	$add = "INSERT INTO ".$userid."_vendors (vid, name) VALUES ('".$userid."', '".$name."')";
	$add_user = mysql_query($add);

	$create = "CREATE TABLE ".$userid."_menu (ID MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	mid VARCHAR(50),
	name VARCHAR(60),
	cost VARCHAR(60),
	other VARCHAR(60));";
	$create_user = mysql_query($create);

	$create = "CREATE TABLE ".$userid."_reviews (ID MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	reviewid VARCHAR(50),
	cid VARCHAR(60),
	comment VARCHAR(60));";
	$create_user = mysql_query($create);

	$create = "CREATE TABLE ".$userid."_ratings (ID MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	rateid VARCHAR(50),
	vid VARCHAR(60),
	rate VARCHAR(60));";
	$create_user = mysql_query($create);

	$create = "CREATE TABLE ".$userid."_orders (ID MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	oid VARCHAR(50));";
	$create_user = mysql_query($create);
}


if ($type == "driver") {

	$userid = time().rand();
	
	$add = "INSERT INTO users (userid, type, name, email, password, encrypt) VALUES ('".$userid."', '".$type."', '".$name."', '".$email."', '".$password."', '".$encrypt."')";
	$add_user = mysql_query($add);

	$create = "CREATE TABLE ".$userid."_drivers (ID MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	did VARCHAR(50),
	name VARCHAR(60),
	location VARCHAR(60),
	ratings VARCHAR(60),
	orders VARCHAR(60),
	tracker VARCHAR(60),
	review VARCHAR(60),
	oid VARCHAR(60));";
	$create_user = mysql_query($create);

	$add = "INSERT INTO ".$userid."_drivers (did, name) VALUES ('".$userid."', '".$name."')";
	$add_user = mysql_query($add);

	$create = "CREATE TABLE ".$userid."_orders (ID MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	oid VARCHAR(50));";
	$create_user = mysql_query($create);

}


}



?>
    <div class="container">


        <div class="col-lg-4">
</div>

        <div class="col-lg-4">
<h2>Signup</h2>
<div style="height: 10px;"> </div>

      <form class="form-signin" action="" method="post"> 


<select name="type" id="type" class="form-control" placeholder="Name" required="" autofocus="">
  <option value="client">Client</option>
  <option value="vendor">Vendor</option>
  <option value="driver">Driver</option>
</select>
        <div style="height: 10px;"> </div>

		<input type="first" name="name" id="1" class="form-control" placeholder="Name" required="" autofocus="">
        <div style="height: 10px;"> </div>
        <input type="first" name="email" id="1" class="form-control" placeholder="Email" required="">
        <div style="height: 10px;"> </div>
        <input type="password" name="password" id="1" class="form-control" placeholder="Password" required="">

      <div style="height: 10px;"> </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup">  <span class="glyphicon glyphicon-tree-conifer" aria-hidden="true"></span> Create Profile</button>
	<div style="height: 10px;"> </div>

    </form>

</div>
        <div class="col-lg-4">
</div>


</div>

</div>
</div>


<?php include  "footer.php";?>