<?php

$host = 'db';
$user = 'root';
$password = 'supersecurerootpassword';
$dbname = 'CSIS2440';
$con = new mysqli($host, $user, $password, $dbname)
        or die('Could not connect to the database server.  ' . mysqli_connect_error($con));

function mysql_fix_string($conn, $string) {
    // get_magic_quotes_gpc was removed in PHP 8
    // if (get_magic_quotes_gpc()) {
        $string = stripslashes($string);
    // }
    $string = htmlentities($string);
    return $conn->real_escape_string($string);
}
