
<?php include "header2.php"; ?>

	
<!-- Begin page content -->
<div class="container">


<form class="form-inline" action="search.php" method="get">
  <div class="form-group">
    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
    <div class="input-group">
      <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>

		<input type="hidden" name="start" id="start" value="0" />
		<input type="hidden" name="per_page" value="6" placeholder="per_page">
		<input type="hidden" name="page" value="5" placeholder="page">
      <input type="text" class="form-control" id="exampleInputAmount" name="name" placeholder="vendor" value="<?php 

$name_get = (isset($_GET['name']) ? $_GET['name'] : null);
echo $name_get;
    ?>">

    </div>
  </div>
  <button type="submit" class="btn btn-primary">Search</button>
</form>


        <div class="col-xs-12 col-sm-12">

<div class="row">

  <div class="panel-body">
<table class="table table-striped">
<th>Vendor</th>
<th>Location</th>
<th>Status</th>
<?php 
	
	if(isset($_GET['page']))
                      {
			$per_page =$_GET['per_page'];
			$page = $_GET['page'];

                      $name=$_GET['name'];
 

                      $start = $_GET['start'];


$record_count = mysql_num_rows(mysql_query("SELECT * FROM users WHERE name LIKE '%$name%' AND type LIKE 'vendor'"));
		
                      $max_pages = $record_count / $per_page;

                      if(!$start)
                      $start = 0;

                      $get = mysql_query("SELECT * FROM users WHERE name LIKE '%$name%' AND type LIKE 'vendor' LIMIT $start, $per_page");
		?>




<?php
		while($row2=mysql_fetch_array($get))
                      {
			$name=$row2['userid'];
			$data="SELECT * FROM ".$name."_vendors";
			$datastring=mysql_query($data);
			$pastedata=mysql_fetch_array($datastring);
			?>


<tr>
<td>
<p class="text-center"><h4><a href="vendor-page.php?vid=<?php  echo $pastedata['vid']; ?>"><?php  echo $pastedata['name']; ?></a>
</td>

<td>
<p class="text-center"><h4><?php  echo $pastedata['location']; ?>
</td>
<td>

<p class="text-center"><h4>
<?php

$result = mysql_query("SELECT * FROM ".$name."_orders");
$rows = mysql_num_rows($result);

$resultsub = mysql_query("SELECT * FROM orders WHERE status='Delivered'");
$rowssub = mysql_num_rows($resultsub);
$total = $rows - $rowssub;
echo $total;
?>
</td>
</tr>









<?php
		}

		$prev = $start - $per_page;
		$next = $start + $per_page;
		echo "";
		?>


      </div>
 </div>
 <nav>
  <ul class="pagination">
<?php
		
		if(!($start<=0))
echo "<li><a href='search?start=$prev&page=$page&per_page=$per_page&name=$name' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
		$i=1;
		for ($x=0;$x<$record_count;$x=$x+$per_page)                          {
			
			if ($start!=$x)
echo "<li><a href='search?start=$x&per_page=$per_page&page=$page&name=$name'>$i</a></li>"; else
echo "<li><a href='#'><font color='#ccc'>$i</font></a></li>";
			$i++;
		}

		
		if(!($start>=$record_count-$per_page))
echo "<li><a href='search?start=$next&page=$page&per_page=$per_page&name=$name' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a><li>";
		echo "";
		?>


  </ul>
</nav>

<?php
 } ?>


</table>
  </div>
 </div>

 </div>
 </div>

 </div>







<?php include "footer.php"; ?>