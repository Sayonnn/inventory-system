<?php 
include("../Connection/Connection.php");
include("../assets/header.php");

if(isset($_POST["submit"])){
  // if(isset($_FILES['itemimage'])){
  //   $tmpFilePath = $_FILES['itemimage']['tmp_name'];
  //   if($tmpFilePath != ''){
  //     $imageData = file_get_contents($tmpFilePath);
  //   }else{
  //     echo ("<Script>alert('Image not added!')</Script>");
  //   }
  // }
  $image  = $_FILES['itemimage'];                         // get image from post data 
  $imageData = $image['name'];                              // image name
  $image_tmp_name = $image['tmp_name'];                     // temp file path

  $mysql = $Opencon->prepare( "INSERT INTO `inventory`(`ItemID`, `Name`, `Price`, `Stocks`, `Sold`, `DateAdded`,`Image`) VALUES (?,?,?,?,?,?,?)");
  $mysql->bind_param("isdiiss",$id,$Name,$Price,$Stocks,$Sold,$Date,$imageData);
  $id ='';
  $Name = $_POST["ItemName"];
  $Stocks = $_POST["Stocks"];
  $Price = $_POST["Price"];
  $Date = $_POST["Date"];
  $Sold = $_POST["Sold"];
  
    
    
    $mysql->execute();
      // {
    //   
    //   echo "<meta http-equiv='refresh' content='0'>";
    // };
    if($mysql->affected_rows > 0){
      echo ("<Script>alert('Item Added!')</Script>");
      $mysql->close();
    }else{
      echo ("<Script>alert('Image not added!')</Script>");
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
  <link rel="stylesheet" href="../assets/css/insert.css">

  <script src="../assets/js/preview.js" defer></script>
</head>
<body class="body">
  

<form class="form container mt-3" method="post"  enctype="multipart/form-data">
    <p class="title">Insert </p>
    <div class = "no-margin no-padding d-flex justify-content-center align-items-center flex-column" style="height:200px">
      <img src="" alt="" style="width:150px;height:150px;border:1px solid black;filter:drop-shadow(15px,15px,15px,black);object-fit:cover" class="rounded-circle m-1" id="image" name="name" >
      <input type="file" name="itemimage" id="itemimage" style = "font-size:10px;width:150px" accept="image/*"/>
    </div>
    <p class="message"></p>
        <div class="flex">
        <label>
            <input required="" placeholder="" type="text" class="input" name="ItemName" >
            <span>Item Name</span>
        </label>

        <label>
            <input required="" placeholder="" type="date" class="input" style="font-size:12px;" name="Date">
        </label>
    </div>  
            
    <label>
        <input required="" placeholder="" type="text" class="input" name="Stocks">
        <span>Stocks Remaining</span>
    </label> 
        
    <label>
        <input required="" placeholder="" type="text" class="input" name="Sold">
        <span>Sold</span>
    </label>
    <label>
        <input required="" placeholder="" type="text" class="input" name="Price">
        <span>Price</span>
    </label>
    <button class="submit" name="submit">Submit</button>
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>