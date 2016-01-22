<?php


  if (isset($_POST['update'])) {
$ticket = $_POST['ticket'];

$update = "UPDATE orders SET status ='Picked Up' WHERE ticket='".$ticket."' ";
$result = mysql_query($update);


  $add = "INSERT INTO ".$userid."_orders (oid) VALUES ('".$ticket."')";
  $add_user = mysql_query($add);


}


?>
    <div class="container">

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-12">

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Open Orders</h3>
  </div>

  <div class="panel-body">
<table class="table table-striped">
<th>Item</th>
<th>Location</th>
<th>Status</th>
<th>Delivery Time</th>
<th>Status</th>
  <?php

  $get_directory= mysql_query("SELECT * FROM orders ORDER BY ID");
  while($show_directory=mysql_fetch_array($get_directory)){
    $name=$show_directory['item'];
    $cost=$show_directory['cost'];
    $notes=$show_directory['notes'];
    $vid=$show_directory['vendors'];
    $cid=$show_directory['clients'];
    $status=$show_directory['status'];
    $delivery=$show_directory['delivery'];
    $location=$show_directory['location'];
    $ticket=$show_directory['ticket'];

if ($status == "Delivered") {
}
else {

  echo "";


  ?>


<tr>
<td>
 <?php echo ucfirst($name);?>
</td>
<td>
921 14th St, Modesto, CA 95354
</td>
<td>
 <?php echo $status;?>
</td>
<td>
 <?php echo $delivery;?>
</td>
<td>

      <form class="form-signin" action="" method="post"> 


    <input type="hidden" name="ticket" id="1" class="form-control" value="<?php echo $ticket;?>" required="" autofocus="">

      <div style="height: 10px;"> </div>
        <button class="btn btn-sm btn-primary btn-block" <?php if ($status == "Pending" or $status == "Picked Up") {
         echo "";?>disabled="disabled"<?php
        }?> type="submit" name="update">Pickup Order</button>
  <div style="height: 10px;"> </div>

    </form>


</td>
</tr>

  <?php 
  }}
   ?>

</table>
  </div>
</div>
        </div>



        <div class="col-lg-12">



<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Closed Orders</h3>
  </div>




  <div class="panel-body">
<table class="table table-striped">
<th>Ticket</th>
<th>Item</th>
<th>Status</th>
<th>Time</th>
  <?php

  $get_directory= mysql_query("SELECT * FROM ".$userid."_orders ORDER BY ID");
  while($show_directory=mysql_fetch_array($get_directory)){
    $oid=$show_directory['oid'];

  $check_user=mysql_query("SELECT * FROM orders WHERE ticket='$oid' ");
  $get_check= mysql_fetch_array($check_user);
  $name=$get_check['item'];
  $cost=$get_check['cost'];
  $other=$get_check['notes'];
  $status=$get_check['status'];
  $delivery=$get_check['delivery'];
  $ticket=$get_check['ticket'];



if ($status == "Delivered") {

echo "";
  ?>


<tr>
<td>
 <?php echo $ticket;?>

</td>
<td>
 <?php echo ucfirst($name);?>

</td>
<td>
 <?php echo $status;?>

</td>
<td>

 <?php echo $delivery;?>

</td>

</tr>
  <?php 
}
  }
   ?>

</table>
  </div>
 </div>



      </div>

      </div>






      </div>
