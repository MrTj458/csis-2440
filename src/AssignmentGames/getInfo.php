<?php
  
require_once "DataBaseConnection.php";

$id = $_GET['productId'];

$sql = "SELECT ProductsName, ProductsPrice, ProductsDesc, ProductsImage FROM Products WHERE idProducts = $id";

echo "<table align='left' width='100%'><tr><th>Name</th><th>Price</th><th colspan='2'>Description</th></tr>";
$result = $conndb->query($sql);

if (mysqli_num_rows($result) > 0) {
  list($infoname, $infoprice, $infodesc, $infoimage) = mysqli_fetch_row($result);
  echo '<tr>';
  echo '<td align="left" width="250px">' . $infoname . '</td>';
  echo '<td align="left" width="125px">$' . $infoprice . "</td>";
  echo '<td align="center">' . $infodesc . '</td>';
  echo "<td align=\"left\"><img src='img/$infoimage' height=\"160\" width=\"160\"></td>";
  echo '</tr>';
}
echo '</table>';
