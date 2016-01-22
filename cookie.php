<?php	
	if(isset($_COOKIE['iA'])) {
		$userid = $_COOKIE['iA'];
		$encrypt = $_COOKIE['uB'];
		$check = mysql_query("SELECT * FROM users WHERE userid = '$userid'")or die(mysql_error());
		while($info = mysql_fetch_array( $check )) {
			$posttype = $info['type'];
			if ($encrypt != $info['encrypt']) {
				header("Location: dashboard.php");
			}

		}

	} else {
		header("Location:index.php");
	}
	


if ($posttype == "client") {

$get="SELECT * FROM ".$userid."_clients";
$get_result =mysql_query($get);
$get_rows=mysql_fetch_array($get_result);
}

if ($posttype == "vendor") {

$get="SELECT * FROM ".$userid."_vendors";
$get_result =mysql_query($get);
$get_rows=mysql_fetch_array($get_result);
}

if ($posttype == "driver") {

$get="SELECT * FROM ".$userid."_drivers";
$get_result =mysql_query($get);
$get_rows=mysql_fetch_array($get_result);
}


	?>