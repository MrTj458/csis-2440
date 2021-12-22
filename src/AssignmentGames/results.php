<!DOCTYPE html>
<?php
  require_once('DataBaseConnection.php');

  // Get form data
  $action = $_POST['action'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $image = $_POST['image'];

  // print("Action: $action, Name: $name, Price: $price, Description: $description, Image: $image");

  function createProduct($con, $pname, $pprice, $pdesc, $pimage) {
    $insert = "INSERT INTO `Products` (`ProductsName`, `ProductsPrice`, `ProductsDesc`, `ProductsImage`) VALUES ('$pname', '$pprice', '$pdesc', '$pimage')";

    $success = $con->query($insert);

    if ($success == FALSE) {
      print('Invalid Query: ' . mysqli_error($con) . '<br>');
    } else {
      echo '<h2>Product created</h2>';
    }
  }

  function updateProduct($con, $pname, $pprice, $pdesc) {
    $update = "UPDATE `Products` SET ";

    // Check which values are given, and only update those.
    if ($pprice && $pdesc) {
      $update .= "`ProductsDesc` = '$pdesc', `ProductsPrice` = '$pprice' ";
    } else if ($pprice) {
      $update .= "`ProductsPrice` = '$pprice' ";
    } else {
      $update .= "`ProductsDesc` = '$pdesc' ";
    }
    $update .= "WHERE (`ProductsName` = '$pname')";

    $success = $con->query($update);
    if ($success == FALSE) {
      print('Invalid Query: ' . mysqli_error($con) . '<br>');
    } else {
      echo '<h2>Product updated</h2>';
    }
  }

  function searchProducts($con, $pname) {
    $search = "SELECT * FROM `Products` WHERE `ProductsName` LIKE '%" . $pname . "%' ORDER BY `ProductsName`";

    $return = $con->query($search);
    
    if (!$return) {
      print('Invalid Query: ' . mysqli_error($con) . '<br>');
    }

    echo '<h3>Products:</h3>';
    while ($row = $return->fetch_assoc()) {
      echo "
        <tr>
          <td>" . $row['idProducts']    . "</td>
          <td>" . $row['ProductsName']  . "</td>
          <td>" . $row['ProductsPrice'] . "</td>
          <td>" . $row['ProductsDesc']  . "</td>
          <td>" . $row['ProductsImage'] . "</td>
        </tr>
      ";
    }
  }
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      body {
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      table {
        border-collapse: collapse;
        border: 1px solid black;
      }

      table td {
        border: 1px solid black;
        padding: 1rem;
      }
    </style>
  </head>
  <body>
  <table>
    <?php
      // Check if the user wants to create or update a row.
      switch($action) {
        case 'update':
          updateProduct($conndb, $name, $price, $description);
          break;
        case 'create':
          createProduct($conndb, $name, $price, $description, $image);
          break;
      }
    ?>
    <thead>
      <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Price</td>
        <td>Description</td>
        <td>Image URL</td>
      </tr>
    </thead>
    <tbody>
      <?php
        // Always search for products to show the data.
        searchProducts($conndb, $name);
      ?>
    </tbody>
  </table>
  </body>
</html>
