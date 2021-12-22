<?php

$update = "UPDATE `Planets` SET `Active` = 'Y' ";//write the update statement
if ($desc != "A short description of the planet") {
    $update .= ", `Desc` = '$desc'";//add the description
}
$update .= "WHERE (`PlanetName` = '$name')";//add the where clause
$success = $con->query($update);
if ($success == FALSE) {
    $failmess = "Whole query " . $update . "<br>";
    echo $failmess;
    print("Invalid Query: " . mysqli_error($con) . "<br>");
} else {
    //let user know it worked
    echo $name . " was updated<br>";
}
