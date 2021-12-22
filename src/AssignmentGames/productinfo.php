<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Check Us Out</title>
  </head>
  <body>
    <h1>Product Info</h1>
    <form action="response.php" method="POST">
      <label for="product">Select a product</label>
      <select name="product">
        <?php
          $options = file_get_contents('text/productinfo.txt');
          preg_match_all("/{([\s\S]*?)}/", $options, $options);

          foreach ($options[0] as $option) {
            $val = ltrim(explode("-", $option)[0], '{');
            print("<option value='" . $val . "'>$val</option>");
          }
        ?>
      </select>

      <label for="name">Name</label>
      <input type="text" name="name">

      <label for="location">Location</label>
      <input type="text" name="location">

      <input type="submit">
    </form>
    <?php
    // put your code here
    ?>
  </body>
</html>
