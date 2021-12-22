<?php
  $host = 'db';
  $user = 'root';
  $password = 'supersecurerootpassword';
  $dbname = 'CSIS2440';

  $con = new mysqli($host, $user, $password, $dbname) or die("Unable to connect to DB.");

  if ($con->connect_error == FALSE) {
    // echo '<h2>We Connected</h2>';
  } else {
    echo $con->connect_error;
  }

  // print_r($con);
