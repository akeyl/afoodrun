<?php include  "header.php";


  if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $cost = $_POST['cost'];
    $notes = $_POST['notes'];

  $mid = time().rand();
  
  $add = "INSERT INTO ".$userid."_menu (mid, name, cost, other) VALUES ('".$mid."', '".$name."', '".$cost."', '".$notes."')";
  $add_user = mysql_query($add);


  }
?>

    <div class="container">


        <div class="col-lg-4">
</div>

        <div class="col-lg-4">
        
<h2>Add</h2>
<div style="height: 10px;"> </div>

      <form class="form-signin" action="" method="post"> 



    <input type="text" name="name" id="1" class="form-control" placeholder="name" required="" autofocus="">

<div style="height: 10px;"> </div>
        <input type="text" name="cost" id="1" class="form-control" placeholder="$0.00" required="">

<div style="height: 10px;"> </div>
        <input type="text" name="notes" id="1" class="form-control" placeholder="notes" required="">

      <div style="height: 10px;"> </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="add">Add to Menu</button>
  <div style="height: 10px;"> </div>

    </form>

</div>
        <div class="col-lg-4">
</div>


</div>

</div>
</div>

<?php include  "footer.php";?>