<?php
    session_start();
    require_once 'DataBaseConnection.php';
    $userName = $_SESSION['user']['fname'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productId = $_POST['productId'];
        $action = $_POST['action'];
        switch ($action) {
        case 'add':
            if (!isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId] = 1;
            } else {
                $_SESSION['cart'][$productId]++;
            }
            break;
        case 'remove':
            $_SESSION['cart'][$productId]--;
            if ($_SESSION['cart'][$productId] <= 0) {
                unset($_SESSION['cart'][$productId]);
            }
            break;
        case 'empty':
            $_SESSION['cart'] = [];
            break;
        }
    }
    // print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cart</title>
        <script>
            async function productInfo() {
                const div = document.getElementById('info')
                const id = document.getElementById('productId').value

                const res = await fetch(`getInfo.php?productId=${id}`)
                const data = await res.text()
                div.innerHTML = data
            }
        </script>
    </head>
    <body>
      <div>
          <a href="logout.php">Sign out</a>
      </div>
      <div class="greeting">
        <p>Hello <?=$userName?>, please select one of our items:</p>
        <form action="cart.php" method="post">
            <select name="productId" id="productId">
                <?php
                    $sql = "SELECT `idProducts`, `ProductsName`, `ProductsPrice` FROM `Products`";
                    $result = $conndb->query($sql);

                    if (!$result) {
                        die("Invalid query " . mysqli_error($conndb));
                    }

                    while (list($id, $name, $price) = mysqli_fetch_row($result)) {
                        echo "<option value='$id'>$name - $$price</option>\n";
                    }
                ?>
            </select>
            <br>
            <input type="submit" name="action" value="add">
            <input type="submit" name="action" value="remove">
            <input type="submit" name="action" value="empty">
            <input type="button" name="action" value="info" onclick="productInfo()">
        </form>
      </div>

      <div class="info" id="info"></div>

      <div class="cart">
        <?php
            if (isset($_SESSION['cart'])) {
                echo "<table border=\"1\" padding=\"3\" width=\"640px\"><tr><th>Name</th><th>Quantity</th><th>Price</th><th width=\"80px\">Line Cost</th></tr>";
                $total = 0;

                foreach($_SESSION['cart'] as $product_id => $quantity) {
                    $sql = "SELECT ProductsName, ProductsPrice FROM CSIS2440.Products WHERE idProducts = $product_id";
                    $result = $conndb->query($sql);

                    if (mysqli_num_rows($result) > 0) {
                        list($name, $price) = mysqli_fetch_row($result);

                        $line_cost = $price * $quantity;
                        $total = $total + $line_cost;

                        echo '<tr>';
                        echo "<td align=\"center\" width=\"450px\">$name</td>";
                        echo "<td align=\"center\" width=\"75px\">$quantity</td>";
                        printf("<td align=\"center\" width=\"75px\">$ %.2f</td>", $price);
                        echo "<td align=\"center\">$" . $line_cost . "</td>";
                        echo '</tr>';
                    }
                }
                echo "<tr>";
                echo "<td align=\"right\" colspan=3>Total</td>";
                echo "<td align=\"right\">$" . $total . "</td>";
                echo "</tr>";
                echo "</table>";
            } else {
                echo 'You have no items in your cart.';
            }
        ?>
      </div>
    </body>
</html>
