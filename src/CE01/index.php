<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>Hello World</title>

  <?php
    $name = 'Trevor H.';
    $age = 22;
    $male = true;
    $iceCream = 'mint';
    $imageFile = 'img/me.jpeg';
  ?>
</head>
<body>
  <?php
    echo "<p>Hello world! This is my first PHP page!</p>";
    echo "<p>My name is $name and I am $age years old.</p>";
    print("<p>My favorite ice-cream is $iceCream.</p>");
    echo "<img src=\"$imageFile\" />"; 
  ?>
</body>
</html>
