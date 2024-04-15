<?php
    session_start();
    if ($_SESSION['is_admin'] != 1 || !isset($_POST['orderId'])) {
        header('location: ../dashboard.php');
        exit();
    } else {
        include('../../php/config.php');
        $order_id = $_POST['orderId'];
        $product_id = $_POST['productId'];
        
        $delete_query = "DELETE FROM order_items WHERE order_id = $order_id AND product_id = $product_id";
        mysqli_query($conn, $delete_query);
        
        $remaining_items_query = "SELECT * FROM order_items WHERE order_id = $order_id";
        $result = mysqli_query($conn, $remaining_items_query);
        
        $total_price = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $total_price += $row['price'] * $row['quantity'];
        }
        
        $update_price_query = "UPDATE orders SET total_price = $total_price WHERE order_id = $order_id";
        mysqli_query($conn, $update_price_query);
    }
?>
