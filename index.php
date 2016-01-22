<?php
include  "config.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0, maximum-scale=0, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>A Food Run</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>
<center><div style="height: 210px;"><img src="blue_logo.png" height="210px"></div></center>

<?php include  "menu.php";

  if(isset($_COOKIE['iA'])) {
    $userid = $_COOKIE['iA'];
    $encrypt = $_COOKIE['uB'];
    $token = $_COOKIE['tC'];
        header("location: dashboard.php");
		$check = mysql_query("SELECT * FROM users WHERE userid = '$userid'")or die(mysql_error());
		while($info = mysql_fetch_array( $check )) {
			
			if ($encrypt != $info['encrypt']) {
				header("Location: dashboard.php");
			}

		}

	}

	srand ((double) microtime( )*1000000000);
	$random_number = rand();

	if (isset($_POST['submit'])) {
		
		if(!$_POST['email'] | !$_POST['password']) {

      ;?>

        <div class="col-lg-4"></div>
        <div class="col-lg-4">
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  Makes sure they filled it in the fields.
</div>
</div>
        <div class="col-lg-4"></div>
<?php
			die('');
		}

		
		if (!get_magic_quotes_gpc()) {
			$_POST['email'] = addslashes($_POST['email']);
		}

		$check = mysql_query("SELECT * FROM users WHERE email = '".$_POST['email']."' ")or die(mysql_error());
		$check2 = mysql_num_rows($check);
		
		if ($check2 == 0) {
      ;?>

        <div class="col-lg-4"></div>
        <div class="col-lg-4">
      <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
Incorrect email or username.
</div>
</div>
        <div class="col-lg-4"></div>



<?php
			die('');
		}

		while($info = mysql_fetch_array($check)) {
			$encrypt=md5($_POST['password']);
			$encrypt = stripslashes($encrypt);
			$info['password'] = stripslashes($info['encrypt']);
			$encrypt = $encrypt;
			
			if ($encrypt != $info['encrypt']) {
        ;?>
        
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
      <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
Incorrect password combination.
</div>
</div>
        <div class="col-lg-4"></div>





<?php
				die('');
			} else {


        $userID = mysql_query("SELECT * FROM users WHERE email = '".$_POST['email']."' ")or die(mysql_error());
        $user_id = mysql_fetch_array($userID);
        $_POST['email'] = stripslashes($_POST['email']);

$needid = $user_id['userid'];
$type = $user_id['type'];

if ($type == "client") {
        $getid = mysql_query("SELECT * FROM ".$needid."_clients ")or die(mysql_error());
        $showid = mysql_fetch_array($getid);
        $posttoken = $showid['token'];
}


if ($type == "vendor") {
        $getid = mysql_query("SELECT * FROM ".$needid."_vendors ")or die(mysql_error());
        $showid = mysql_fetch_array($getid);
        $posttoken = $showid['token'];
}


if ($type == "driver") {
        $getid = mysql_query("SELECT * FROM ".$needid."_drivers ")or die(mysql_error());
        $showid = mysql_fetch_array($getid);
        $posttoken = $showid['token'];
}



        $hour = time() + 3600;
      $cookie = $_POST['cookie'];

    if($cookie=='on'){
                $hour = time()+60*60*24*100;
    } else {
            $hour = time() + 3600;
    }


        $encrypt=md5($_POST['password']);
        setcookie(iA, $needid, $hour);
        setcookie(uB, $encrypt, $hour);
        setcookie(tC, $posttoken, $hour);
        header("location: dashboard.php");


			}

		}

	}

?>


    <div class="container">


        <div class="col-lg-4">
</div>

        <div class="col-lg-4">
<div style="height: 10px;"> </div>

      <form class="form-signin" action="" method="post"> 


        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="username" id="inputEmail" name="email" class="form-control" placeholder="Email" required="" autofocus="">
        <div style="height: 10px;"> </div>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="on" name="cookie"> Remember me
          </label>
        </div> 
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit"> Login <span class="glyphicon glyphicon-grain" aria-hidden="true"></span></button>
<div style="height: 10px;"> </div>

</div>

        <div class="col-lg-4">
</div>

    </div> <!-- /container -->

<?php include "footer.php"; ?>