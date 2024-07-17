<?php 

include("../assets/header.php");
include("../Connection/Connection.php");

if(isset($_POST["back"]) ){
  header("location:/public/index.php");
  header("Refresh:0");
}

global $soldTotal;
$soldTotal = 0;
$stockTotal = 0;
$saleTotal = 0;
$saleQuote = 100000;
$itemQuota = 100;
$itemTotal = 0;
$mysql = "Select * from inventory";
$query = mysqli_query($Opencon,$mysql);
while($row = mysqli_fetch_array($query)){

  $id = $row["ItemID"];
  $name = $row["Name"];
  $price = $row["Price"];
  $date = $row["DateAdded"];
  $sold = $row["Sold"];
  $stocks = $row["Stocks"];
  $imagename = $row["Image"];
  //track total sold items
  $soldTotal += intVal($sold); 
  //track total item stock
  $stockTotal += intVal($stocks); 
  //track total sales
  $saleTotal += $sold * $price; 
  //track total item count
  $itemTotal += 1;

}
$soldPercentage = $soldTotal / $stockTotal;
$salePercentage = $saleTotal / $saleQuote;
$itemPercentage = $itemTotal / $itemQuota;



?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/layout.css">
  <link rel="stylesheet" href="../assets/css/sales.css">
</head>
<body class="body">

<div class="container bg-container d-flex justify-content-around align-items-center p-5">

  <div class="card1m-3" style="height:30em; display:flex; flex-direction:column; align-items:center;">
    <svg>
      <circle class="bg" cx="57" cy="57" r="52" />
      <circle class="meter-1" cx="57" cy="57" r="50" style="--width: <?php echo $soldPercentage?>" />
    </svg>
    <h5 style = "color:#0ef">Total Sold</h5>
    <h6 style = "color:#0ef"><?php echo $soldTotal?>  /  <?php echo $stockTotal ?></h6>
  </div>
  <div class="card1 m-3" style="height:30em; display:flex; flex-direction:column; align-items:center;">
    <svg>
      <circle class="bg" cx="57" cy="57" r="52" />
      <circle class="meter-2" cx="57" cy="57" r="50" style="--width: <?php echo $salePercentage?>" />
    </svg>
    <h5 style = "color:#0ef">Total Sales</h5>
    <h6 style = "color:#0ef"><?php echo $saleTotal?>  /  <?php echo $saleQuote?></h6>
  </div>
  <div class="card1 m-3" style="height:30em; display:flex; flex-direction:column; align-items:center;">
    <svg>
      <circle class="bg" cx="57" cy="57" r="52" />
      <circle class="meter-3" cx="57" cy="57" r="50" style="--width: <?php echo $itemPercentage?>" />
    </svg>
    <h5 style = "color:#0ef">Total Items</h5>
    <h6 style = "color:#0ef"><?php echo $itemTotal ?></h6>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>