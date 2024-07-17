<?php 
include("../Connection/Connection.php");
include("../assets/header.php");

if(isset($_GET["id"])) {
  $id = $_GET["id"];
  $mysql = "Select * from inventory where ItemID =".$id."";
  $query = mysqli_query($Opencon,$mysql);
  while($row = mysqli_fetch_array($query)){
     $id = $row["ItemID"];
     $name = $row["Name"];
     $price = $row["Price"];
     $date = $row["DateAdded"];
     $sold = $row["Sold"];
     $stocks = $row["Stocks"];
     $imagename = $row["Image"];
  }
}
if(isset($_POST["update"])){
    $id = $_GET["id"];
    $ItemName = $_POST["itemName"];
    $ItemDate = $_POST["itemDate"]; 
    $ItemStocks = $_POST["itemStocks"]; 
    $ItemPrice = $_POST["itemPrice"]; 
    $ItemSold = $_POST["itemSold"]; 

    $image  = $_FILES['itemimage'];                         // get image from post data 
    $imageData = $image['name'];                              // image name
    $image_tmp_name = $image['tmp_name'];                     // temp file path

    $mysql = "UPDATE `inventory` SET `Name`='$ItemName',`Price`='$ItemPrice',`Stocks`='$ItemStocks',`Sold`='$ItemSold',`DateAdded`='$ItemDate',`Image`='$imageData' WHERE `ItemID`='$id'";
    if(mysqli_query($Opencon,$mysql)){
        echo ("<Script>alert('Item Updated!')</Script>");
         header("location:/public/index.php");
    }else{
        echo ("<Script>alert('Failed to update data!')</Script>");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/layout.css">
  <link rel="stylesheet" href="../assets/css/update.css">

  <script src="../assets/js/preview.js" defer></script>
</head>
<body class="body">
  

<form class="form container mt-3" method="post" enctype="multipart/form-data">
    <p class="title">Update </p>
    <div class = "no-margin no-padding d-flex justify-content-center align-items-center flex-column" style="height:200px">
      <img src="" alt="" style="width:150px;height:150px;border:1px solid black;filter:drop-shadow(15px,15px,15px,black);object-fit:cover" class="rounded-circle m-1" id="image" name="name">
      <input type="file" name="itemimage" id="itemimage" class="" style = "font-size:10px;width:150px" accept="image/*"/>
    </div>
    <p class="message"></p>
        <div class="flex">
        <label>
            <input required="" name="itemName" type="text" class="input" value=<?php echo $name?>>
            <span>Item Name</span>
        </label>

        <label>
            <input required="" name="itemDate" type="date" class="input" style="font-size:12px;" value=<?php echo $date?>>
        </label>
    </div>  
            
    <label>
        <input required="" name="itemStocks" type="text" class="input" value=<?php echo $stocks?>>
        <span>Stocks Remaining</span>
    </label> 
        
    <label>
        <input required="" name="itemSold" type="text" class="input" value=<?php echo $sold?>>
        <span>Sold</span>
    </label>
    <label>
        <input required="" name="itemPrice" type="text" class="input" value=<?php echo $price?>>
        <span>Price</span>
    </label>
    <button class="submit" name="update">Update</button>
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>