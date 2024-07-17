<?php 

include("./Connection/Connection.php");

if(isset($_GET["id"]) ){
  $id = $_GET["id"];
  $mysql = "DELETE FROM inventory WHERE ItemID = ".$id."";
  $query = mysqli_query($Opencon,$mysql);
  header("location: index.php");
}

