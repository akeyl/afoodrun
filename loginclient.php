<?php

  if(isset($_COOKIE['iA'])) {
    $userid = $_COOKIE['iA'];
    $encrypt = $_COOKIE['uB'];
    $token = $_COOKIE['tC'];
        header("location: home");
		$check = mysql_query("SELECT * FROM clients WHERE userid = '$userid'")or die(mysql_error());
		while($info = mysql_fetch_array( $check )) {
			
			if ($encrypt != $info['encrypt']) {
				header("Location: home");
			}

		}

	}

	srand ((double) microtime( )*1000000000);
	$random_number = rand();

	if (isset($_POST['submit'])) {
		
		if(!$_POST['email'] | !$_POST['password']) {

      ;?>
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  Makes sure they filled it in the fields.
</div>
<?php
			die('');
		}

		
		if (!get_magic_quotes_gpc()) {
			$_POST['email'] = addslashes($_POST['email']);
		}

		$check = mysql_query("SELECT * FROM users WHERE email = '".$_POST['email']."' OR url = '".$_POST['email']."' ")or die(mysql_error());
		$check2 = mysql_num_rows($check);
		
		if ($check2 == 0) {
      ;?>
      <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
Incorrect email or username.
</div>



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
      <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
Incorrect password combination.
</div>





<?php
				die('');
			} else {


        $userID = mysql_query("SELECT * FROM users WHERE email = '".$_POST['email']."' OR url = '".$_POST['email']."' ")or die(mysql_error());
        $user_id = mysql_fetch_array($userID);
        $_POST['email'] = stripslashes($_POST['email']);

$needid = $user_id['userid'];

        $getid = mysql_query("SELECT * FROM ".$needid."_profile ")or die(mysql_error());
        $showid = mysql_fetch_array($getid);
        $posttoken = $showid['token'];


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
        header("location: home");


			}

		}

	}

?>
