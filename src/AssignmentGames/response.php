<?php
  $product = $_POST['product'];
  $name = $_POST['name'];
  $location = $_POST['location'];
  print("Product: $product, Name: $name, Location: $location");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="flex flex-col items-center p-8">
        <?php
        print("<h1 class='text-4xl'>Hello $name!</h1>");

        $serviceAreas = explode(",", file_get_contents('text/servicearea.txt'));
        if (in_array($location, $serviceAreas)) {
            print("<h3>We service your location!</h3>");
        } else {
            print("<h3>Unfortunately, we don't service your location.</h3>");
        }

        switch($product) {
            case "Chess":
                print("<img src='img/chess1.jpg' width='500' />");
                break;
            case "Board Games":
                print("<img src='img/games1.jpg' width='500' />");
                break;
            case "Home Escape Rooms":
                print("<img src='img/escaperoom1.jpg' width='500' />");
                break;
            case "Murder Parties":
                print("<img src='img/murderparty1.jpg' width='500' />");
                break;
            case "Educational Games":
                print("<img src='img/educationgame1.jpg' width='500' />");
                break;
        }

        $products = file_get_contents('text/productinfo.txt');
        preg_match_all("/{([\s\S]*?)}/", $products, $products);
        $products = $products[0];

        foreach ($products as $p) {
            if (str_contains($p, $product)) {
                $info = rtrim(ltrim($p, '{'), '}');
                print("<p>$info</p>");
                break;
            }
        }
        ?>
    </body>
</html>
