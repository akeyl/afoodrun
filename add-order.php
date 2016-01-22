<?php

include "header.php";


		$mid = $_GET['mid'];
		$vid = $_GET['vid'];

		$date = time();

  $ticket = time().rand();

  $check_user=mysql_query("SELECT * FROM ".$vid."_menu WHERE mid='$mid'");
  $get_check= mysql_fetch_array($check_user);

  $name=$get_check['name'];
  $cost=$get_check['cost'];
  $notes=$get_check['other'];

  $poploc=mysql_query("SELECT * FROM users WHERE userid='$userid' ");
  $getloc= mysql_fetch_array($poploc);

  $location=$getloc['location'];

	$postadd = "INSERT INTO orders (ticket, oid, status, clients, vendors, item, cost, notes, date) VALUES ('".$ticket."','".$mid."', 'Pending', '".$userid."', '".$vid."', '".$name."', '".$cost."', '".$notes."', '".$date."')";
	$postmake = mysql_query($postadd);


	$add = "INSERT INTO ".$userid."_orders (oid) VALUES ('".$ticket."')";
	$add_user = mysql_query($add);

	$add = "INSERT INTO ".$vid."_orders (oid) VALUES ('".$ticket."')";
	$add_user = mysql_query($add);




?>
    <div class="container">


        <div class="col-lg-4">
</div>

        <div class="col-lg-4">
<h2>Added</h2>
<div style="height: 10px;"> </div>



</div>
        <div class="col-lg-4">
</div>


</div>

</div>
</div>


<?php include  "footer.php";?>