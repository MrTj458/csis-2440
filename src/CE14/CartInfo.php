<?php

require_once 'DataBaseConnection.php';
$infonum = $_GET['info'];
if ($infonum > 0) {
  $sql = "SELECT ResName, ResPPU, ResDesc, ResImage FROM CSIS2440.Resources where idResources = $infonum";

  echo "<table align='left' width='100%'><tr><th>Name</th><th>Price</th><th colspan=2>Description</th></tr>";
  $result = $con->query($sql);

  if (mysqli_num_rows($result) > 0) {
    list($infoname, $infoprice, $infodesc, $infoimage) = mysqli_fetch_row($result);
    echo '<tr>';
    echo '<td align="left" width="250px">' . $infoname . '</td>';
    echo '<td align="left" width="125px">$' . $infoprice . "</td>";
    echo '<td align="center">' . $infodesc . '</td>';
    echo "<td align=\"left\"><img src='img\\$infoimage' height=\"160\" width=\"160\"></td>";
    echo '</tr>';
  }
  echo '</table>';
}
