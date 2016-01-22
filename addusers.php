<?php
	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("afoodrun") or die(mysql_error());


	$userid = time().rand();
	
	$add = "INSERT INTO clients (cid, email, password) VALUES ('".$userid."', 'email', 'password')";
	$add_user = mysql_query($add);

	$create = "CREATE TABLE ".$userid."_clients (ID MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	cid VARCHAR(50),
	name VARCHAR(60),
	location VARCHAR(60),
	oid VARCHAR(60));";
	$create_user = mysql_query($create);



?>