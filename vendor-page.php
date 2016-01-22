
<?php include "header.php";

  if (isset($_POST['addorder'])) {

    $mid = $_POST['mid'];
    $vid = $_POST['vid'];
    $time = $_POST['time'];
    $side = $_POST['side'];

  $delivery = $time.$side;

    $date = time();

  $ticket = time().rand();

  $check_user=mysql_query("SELECT * FROM ".$vid."_menu WHERE mid='$mid'");
  $get_check= mysql_fetch_array($check_user);

  $name=$get_check['name'];
  $cost=$get_check['cost'];
  $notes=$get_check['other'];


  $postadd = "INSERT INTO orders (ticket, oid, status, clients, vendors, item, cost, notes, delivery, date) VALUES ('".$ticket."','".$mid."', 'Pending', '".$userid."', '".$vid."', '".$name."', '".$cost."', '".$notes."', '".$delivery."', '".$date."')";
  $postmake = mysql_query($postadd);


  $add = "INSERT INTO ".$userid."_orders (oid) VALUES ('".$ticket."')";
  $add_user = mysql_query($add);

  $add = "INSERT INTO ".$vid."_orders (oid) VALUES ('".$ticket."')";
  $add_user = mysql_query($add);
}

 ?>



    <div class="container">
<h2><?php



$vid = (isset($_GET['vid']) ? $_GET['vid'] : null);





      $data="SELECT * FROM ".$vid."_vendors";
      $datastring=mysql_query($data);
      $pastedata=mysql_fetch_array($datastring);


  $check_user=mysql_query("SELECT * FROM users WHERE userid='$vid'");
  $get_check= mysql_fetch_array($check_user);



?>

<center>
<img src="splash_01.png" class="thumbnail" style="width: 100%;">

<h4 align="text-center"><?php  echo $pastedata['name']; ?><br><small><?php echo $get_check['location']; ?></small></h4></center>
  <div style="height: 10px;"> </div>

</h2>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-12">

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Menu</h3>
  </div>


  <div class="panel-body">
<table class="table table-striped">
<th>Item</th>
<th>Cost</th>
<th>Time</th>
<th> </th>
  <?php

  $get_directory= mysql_query("SELECT * FROM ".$vid."_menu ORDER BY ID");
  while($show_directory=mysql_fetch_array($get_directory)){
    $name=$show_directory['name'];
    $cost=$show_directory['cost'];
    $other=$show_directory['other'];
    $mid=$show_directory['mid'];

  ?>
<tr>
<td>
 <?php echo ucfirst($name);?>
</td>
<td>
 $<?php echo $cost;?>
</td>
<td>
<?php 

if ($posttype == "client") { echo "";?>


      <form class="form-signin" action="" method="post"> 


    <input type="hidden" name="vid" id="1" class="form-control" value="<?php echo $vid;?>" required="" autofocus="">
    <input type="hidden" name="mid" id="1" class="form-control" value="<?php echo $mid;?>" required="" autofocus="">


<select name="time" class="form-control" style="width: 50px;" required="" autofocus="">
  <option value="01">01</option>
  <option value="02">02</option>
  <option value="03">03</option>
  <option value="04">04</option>
  <option value="05">05</option>
  <option value="06">06</option>
  <option value="07">07</option>
  <option value="08">08</option>
  <option value="09">09</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
</select>
<select name="min" class="form-control" style="width: 50px;" required="" autofocus="">
  <option value="15">15</option>
  <option value="30">30</option>
  <option value="45">45</option>
</select>
<select name="side" class="form-control" style="width: 50px;" required="" autofocus="">
  <option value="AM">AM</option>
  <option value="PM">PM</option>
</select>

</td>
<td>
      <div style="height: 10px;"> </div>
        <button class="btn btn-sm btn-primary btn-block" type="submit" name="addorder">Add to Cart</button>
  <div style="height: 10px;"> </div>

    </form>


</td>


<?php }

?>

</tr>
  <?php 
  }
   ?>

</table>
  </div>
</div>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Hours</h3>
  </div>
  <div class="panel-body">
Mon 12:00 pm - 10:30 pm <br>
Tue 12:00 pm - 10:30 pm <br>
Wed 12:00 pm - 10:30 pm <br>
Thu 12:00 pm - 11:30 pm <br>
Fri 12:00 pm - 11:30 pm <br>
Sat 11:30 am - 11:30 pm <br>
Sun 11:30 am - 10:30 pm <br>
  </div>
</div>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">About</h3>
  </div>
  <div class="panel-body">
<?php  echo $pastedata['name']; ?> is a place with no dress code, where the food speaks for itself. Evan and Sarah believe that eating out should be relaxed, fun and exciting. It should remind you of the good times you share with family while introducing you to new tastes in the company of friends. The staff at <?php  echo $pastedata['name']; ?>  will use their years of experience to provide food that is expertly prepared and served, while set in a surrounding that is modern, convivial, and comfortable.
  </div>
</div>

        </div>


        <div class="col-lg-12">

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Location</h3>
  </div>
  <div class="panel-body">
  
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3159.3406354615777!2d-120.99637268515798!3d37.64119497978406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzfCsDM4JzI4LjMiTiAxMjDCsDU5JzM5LjEiVw!5e0!3m2!1sen!2sus!4v1452985118354" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>

  </div>
</div>

        </div>



        <div class="col-lg-12">




      </div>

      </div>

      </div>


<?php include "footer.php"; ?>