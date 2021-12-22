<!DOCTYPE html>
<?php
$capName = ucwords(strtolower(htmlentities($_POST['CapName'])));

$capAge = htmlentities($_POST['CapAge']);
$shipName = htmlentities($_POST['ShipName']);
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="row">
          <div class="col-2"></div>
          <div class="col-8">
            <?php
              print("
                <p>
                  Captain $capName at the age of $capAge took over 
                  the ship $shipName and here is some of their past.
                </p>
              ");

              // Early Career
              $pos = 0;
              $earlyFile = fopen('EarlyYears.txt', 'r') or die('Unable to open file!');
              while (!feof($earlyFile)) {
                $randomEarly[$pos] = fgets($earlyFile);
                $pos++;
              }
              fclose($earlyFile);

              shuffle($randomEarly);
              print("
                <p>The early career started with:</p>
                <ul>
                  <li>
                  ". $randomEarly[0] ."
                  </li>
                  <li>
                  ". $randomEarly[1] ."
                  </li>
                </ul>
              ");

              // Later career
              if ($capAge > 25) {
                $tours = 4 + ($capAge - 26);
              } else {
                $tours = floor(($capAge - 17) / 2);
              }

              $randomTours = explode("\n", file_get_contents('Tours.txt'));
              shuffle($randomTours);

              print("
                <p>The career looks like this:</p>
                <ul>
              ");
              for ($y = 0; $y < $tours; $y++) {
                print("
                  <li>". $randomTours[$y] ."</li>
                ");
              }
              print("
                </ul>
              ");
            ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
