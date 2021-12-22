<?php
  session_start();
  unset($_SESSION['invalidLogin']);

  $email = $_POST['email'];
  $pwd = $_POST['password'];

  require_once 'DataBaseConnection.php';

  $email = mysql_fix_string($conndb, $email);
  $pwd = mysql_fix_string($conndb, $pwd);

  $hashed = hash('ripemd128', $pwd);

  $sql = "SELECT * FROM `Clients` WHERE `email` = '$email' AND `thepassword` = '$hashed'";

  $result = $conndb->query($sql);

  if (!$result) {
    $message = "Whole query " . $sql;
    echo $message;
    die("Invalid query " . mysqli_error($conndb));
  }

  $count = $result->num_rows;

  if ($count == 1) {
    $row = $result->fetch_assoc();

    $_SESSION['user']['email'] = $row['email'];
    $_SESSION['user']['fname'] = $row['fname'];
    $_SESSION['user']['lname'] = $row['lname'];

    header("Location:cart.php");
  } else {
    header("Location:login.php");
    $_SESSION['invalidLogin'] = TRUE;
  }
?>
