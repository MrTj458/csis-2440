<!DOCTYPE html>
<?php
include 'IncludeMe.php';
print_r($_POST);
$ship = $ships[$_POST['ship']];
$departure = $planets[$_POST['departure']];
$arrival = $planets[$_POST['arrival']];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Results</title>
        <style>
            img {
                height: 250px;
                padding: 3pt;
            }
            p{
                margin-left: 8px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <h3>Leaving From:
                    <?php
                    echo $departure['name'];
                    ?>
                    <img src="imgs/<?php echo $_POST['departure'] ?>.jpg">
                </div>
                <div class="col-3">
                    <h3>Arriving At:
                    <?php
                    echo $arrival['name'];
                    ?>
                    <img src="imgs/<?php echo $_POST['arrival'] ?>.jpg">
                </div>
                <div class="col-6">
                    <h3>Information</h3>
                    <ul>
                    <?php
                    $distance = PlanetDistance(
                        $departure['x'], $departure['y'], $departure['z'],
                        $arrival['x'], $arrival['y'], $arrival['z']
                    );
                    
                    echo '<li>Ship: ' . $ship['name'] . '</li>';
                    printf('<li>Distance: %0.2f</li>', $distance);
                    printf('<li>Time: %0.2f cycles</li>', $distance / $ship['speed']);
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
