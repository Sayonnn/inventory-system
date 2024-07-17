<?php 
  include("./Connection/Connection.php"); 
  include("./assets/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/layout.css">
  <link rel="stylesheet" href="./assets/css/home.css">
  <title>Mr BroCode Inventory System</title>
</head>
<body class="body">

  <div class="container bg-container p-3">
    <div class="table-responsive ">
    <table class="table table-sm table-hover table-bordered table-striped table-collapse" style="border-radius:25%;">
      <thead class="table-warning">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Item</th>
          <th scope="col">Price</th>
          <th scope="col">Stocks</th>
          <th scope="col">Date Added</th>
          <th scope="col">Sold</th>
          <th scope="col">Operations</th>
          <th scope="col">Preview</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $mysql = "SELECT * FROM Inventory";
          $query = mysqli_query($Opencon, $mysql);
          while ($row = mysqli_fetch_assoc($query)) {
            $ID = $row["ItemID"];
            $Name = $row["Name"];
            $Price = $row["Price"];
            $DateAdded = $row["DateAdded"];
            $Stocks = $row["Stocks"];
            $Image = $row["Image"];
            $Sold = $row["Sold"];
            
            if ($row <= 0) {
              return null;
            }else{
              
              echo '<tr>
              <th scope = "row">'.$ID.'</th>
              <td >'.$Name.'</td>
              <td >'.$Price.'</td>
              <td >'.$DateAdded.'</td>
              <td >'.$Stocks.'</td>
              <td >'.$Sold.'</td>
              <td class = "px-0 text-center" style="width:250px">
                <button class="btn btn-sm btn-warning" ><a href="components/view.php?id='.$ID.'">View</a></button>
                <button class="btn btn-sm btn-info" ><a href="components/update.php?id='.$ID.'">Update</a></button>
                <button class="btn btn-sm btn-danger" ><a href="components/delete.php?id='.$ID.'">Delete</a></button>
              </td>
              <td style = "object-fit:cover;"><img src ="../assets/img/'.$Image.'" style = "object-fit:contain;height:100px;width:100px;"></img></td>
              </tr>';
            }
          }
        ?>
      </tbody>
    </table>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>