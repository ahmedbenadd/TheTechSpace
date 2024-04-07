<?php
    include('php/config.php');
    session_start();    
?>
<?php
    $query = "SELECT product_id, quantity FROM cart WHERE user_id = '" . $_SESSION["id"] . "'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row["product_id"];
            $quantity = $row["quantity"];

            $product_query = "SELECT name, img_1 FROM products WHERE id = '" . $product_id . "'";
            $product_result = mysqli_query($conn, $product_query);

            if ($product_result && mysqli_num_rows($product_result) > 0) {
                $product = mysqli_fetch_assoc($product_result);
                echo $product['img_1'] . $product['name'] . "<br>";
            } else {
                echo "Product not found<br>";
            }

            mysqli_free_result($product_result);
        }
    } else {
        echo "Your cart is empty.";
    }

    mysqli_free_result($result);
?>