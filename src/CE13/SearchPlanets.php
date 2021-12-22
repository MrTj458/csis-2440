<!DOCTYPE html>
<?php
require_once 'DataBaseConnection.php';
$ships = array(
    array("name" => "Crate",
        "speed" => 1.8),
    array("name" => "Lightening",
        "speed" => 4.3),
    array("name" => "Starliner",
        "speed" => 2.4),
    array("name" => "VD Tug",
        "speed" => 1.4),
    array("name" => "Biel-Corp II",
        "speed" => 1.3),
    array("name" => "VD Behemoth",
        "speed" => 0.5)
);
$sql = "SELECT id, PlanetName FROM CSIS2440.Planets";
$return = $con->query($sql);
if (!$return) {
    $message = "Whole query " . $search;
    echo $message;
    die('Invalid query: ' . mysqli_error($con));
}
$planetArray = array();
while ($row = $return->fetch_assoc()) {
    array_push($planetArray, $row);
}
//print_r($planetArray);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search the Planets</title>
        <script src="Asynch.js" type="text/javascript"></script>
        <script>
            async function calculateDistance() {
                const speed = document.getElementById('speed').value
                const id1 = document.getElementById('planet1').value
                const id2 = document.getElementById('planet2').value
                const results = document.getElementById('results')

                const res = await fetch(`/CE13/SQLPlantSearch.php?ID1=${id1}&ID2=${id2}&speed=${speed}`)
                const body = await res.text()
                results.innerHTML = body

                // let data_file = `SQLPlantSearch.php?ID1=${id1}&ID2=${id2}&speed=${speed}`
                // console.log(data_file)
                // let http_request = AJAXRequest()
                // http_request.onreadystatechange = function() {
                //     console.log(http_request.readyState)
                //     if (http_request.readyState == 4) {
                //         console.log('Using my code')
                //         results.innerHTML = http_request.responseText
                //     }
                // }
                // http_request.open('GET', data_file, true)
                // http_request.send()
                // return false
            }
        </script>

        <?php
        include "Header.php";
        ?>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <form method = "post" action = "#">
                    <div class="form-group">
                        <label for="ship">The Ship you will use</label>
                        <select id="speed" name="ship">
                            <option vlaue="--">--</option>
                            <?php
                            for ($i = 0; $i < sizeof($ships); $i++) {
                                print("<option value=" . $ships[$i]['speed'] . ">" . $ships[$i]['name'] . "</option>");
                            }
                            ?>
                        </select >
                        <label for="planet1">The departure planet</label>
                        <select id="planet1" name="departure">
                            <option vlaue="--">--</option>
                            <?php
                            for ($i = 0; $i < 17; $i++) {
                                print("<option value=" . $planetArray[$i]['id'] . ">" . $planetArray[$i]['PlanetName'] . "</option>");
                            }
                            ?>
                        </select>
                        <lable for="planet2">Destination planet</lable>
                        <select id="planet2" name="arrival">
                            <option vlaue="--">--</option>
                            <?php
                            for ($i = 0; $i < 17; $i++) {
                                print("<option value=" . $planetArray[$i]['id'] . ">" . $planetArray[$i]['PlanetName'] . "</option>");
                            }
                            ?>
                        </select>
                        <input type="Button" name="Calculate" value="Get the Estimate" onclick="calculateDistance();">              

                    </div>
                </form>
            </div>
        </div>
        <span id="results">
            <div class="row">
                <div class="col-md-offset-1 col-md-5">

                </div>
                <div class="col-md-5">

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">

                </div>
            </div>
        </span>
    </div>
    <?php
    include "Footer.php";
    ?>

