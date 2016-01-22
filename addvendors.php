<?php
	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("afoodrun") or die(mysql_error());


	$userid = time().rand();
	
	$add = "INSERT INTO vendors (vid, name, email, password) VALUES ('".$userid."', 'name', 'email', 'password')";
	$add_user = mysql_query($add);

	$create = "CREATE TABLE ".$userid."_vendors (ID MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	vid VARCHAR(50),
	name VARCHAR(60),
	location VARCHAR(60),
	about VARCHAR(60),
	oid VARCHAR(60));";
	$create_user = mysql_query($create);

	$add = "INSERT INTO ".$userid."_vendors (vid, name, location, about, oid) VALUES ('".$userid."', 'blues', 'chill place', 'Modesto,CA', '5')";
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



?>