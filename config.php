<?php
	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("afoodrun") or die(mysql_error());

	$domain_name="http://afood.run";
	$domain_title="A Food Run";
?>