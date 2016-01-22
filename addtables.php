<?php
	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("afoodrun") or die(mysql_error());

	$domain_name="http://afood.run";
	$domain_title="A Food Run";



////////////CHECK EMAIL////////////
///$chkinvites="SELECT * FROM invites WHERE code='$getcode'";
//$postinvites =mysql_query($chkinvites);
//$rowinvites=mysql_fetch_array($postinvites);

//$thisinvites = $rowinvites['code'];

				$create = "CREATE TABLE users (ID MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	userid VARCHAR(50),
	type VARCHAR(60),
	name VARCHAR(60),
	email VARCHAR(60),
	password VARCHAR(60),
	encrypt VARCHAR(60),
	location VARCHAR(60));";
				$create_user = mysql_query($create);

				$create = "CREATE TABLE orders (ID MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	ticket VARCHAR(50),
	oid VARCHAR(50),
	status VARCHAR(50),
	clients VARCHAR(50),
	vendors VARCHAR(50),
	drivers VARCHAR(50),
	item VARCHAR(100),
	location VARCHAR(50),
	cost VARCHAR(50),
	tax VARCHAR(50),
	notes VARCHAR(100),
	delivery VARCHAR(100),
	date VARCHAR(100));";
				$create_user = mysql_query($create);




?>