
<?php include "header.php"; ?>

    <div class="container">
<h2>Orders</h2>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-12">

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"># <?php



$order = (isset($_GET['order']) ? $_GET['order'] : null);

echo $order;

if ($order == "123") {
  echo "123";
}
  ?></h3>
  </div>
  <div class="panel-body">
    Chicken Salad



    Chicken Salad


    Chicken Salad


    Chicken Salad


    Chicken Salad
  </div>
</div>
        </div>


      </div>


      </div>


<?php include "footer.php"; ?>