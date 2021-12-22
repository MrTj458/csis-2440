<?php

require_once 'DataBaseConnection.php';

// function to print distance 
function PlanetDistance($x1, $y1, $z1, $x2, $y2, $z2) {
    $dist = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2) + pow($z2 - $z1, 2) * 1.0);
    return $dist;
}
//use Get to get variables
$shipSpeed = $_GET['speed'];
$planetId1 = $_GET['ID1'];
$planetId2 = $_GET['ID2'];

//Query first planet
$sql1 = 'SELECT * FROM CSIS2440.Planets WHERE id = ' . $planetId1;
$return = $con->query($sql1);
if (!$return) {
    $message = "Whole Query " . $sql1;
    echo $message;
    die('Invalid query: ' . mysqli_error($con));
}

while ($row = $return->fetch_assoc()) {
    $pname1 = $row['PlanetName'];
    $x1 = $row['PosX'];
    $y1 = $row['PosY'];
    $z1 = $row['PosZ'];
    $desc1 = $row['Desc'];
    $faction1 = $row['Faction'];
    $active1 = $row['Active'];
}

//query second planet
$sql2 = 'SELECT * FROM CSIS2440.Planets WHERE id = ' . $planetId2;
$return = $con->query($sql2);
if (!$return) {
    $message = 'Whole Query: ' . $sql2;
    echo $message;
    die('Invalid query: ' . mysqli_error($con));
}

while ($row = $return->fetch_assoc()) {
    $pname2 = $row['PlanetName'];
    $x2 = $row['PosX'];
    $y2 = $row['PosY'];
    $z2 = $row['PosZ'];
    $desc2 = $row['Desc'];
    $faction2 = $row['Faction'];
    $active2 = $row['Active'];
}

//lets print everything out
echo "<div><table><th>Name</th><th width='10%'>X,Y,Z</th><th>Description</th><th>Faction</th>"
 . "<th>Station</th>";
    echo "<tr><td>" . $pname1
    . "</td><td>" . $x1 . ", " . $y1 . ", " . $z1
    . "</td><td width=\"500px\">" . $desc1
    . "</td><td>" . $faction1
    . "</td><td>" . $active1 . "</td></tr>";
echo "</table></div>";

echo "<div><table><th>Name</th><th width='10%'>X,Y,Z</th><th>Description</th><th>Faction</th>"
 . "<th>Station</th>";
    echo "<tr><td>" . $pname2
    . "</td><td>" . $x2 . ", " . $y2 . ", " . $z2
    . "</td><td width=\"500px\">" . $desc2
    . "</td><td>" . $faction2
    . "</td><td>" . $active2 . "</td></tr>";
echo "</table></div>";

if ($active1 != 'N' && $active2 != 'N') {
    print("<div>Going from $pname1 to $pname2 will be a long trip</div>");
    $dist = PlanetDistance($x1, $y1, $z1, $x2, $y2, $z2);
    printf("<p>The distance is: %.2f</p>", $dist);
    printf("<p>The time it would take is: %.2f cycles</p>", ($dist / $shipSpeed));
} else {
    print("<div><p>One of the planets is not active, you cannot travel there.</p></div>");
}
