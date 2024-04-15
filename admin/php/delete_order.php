<?php
    session_start();
    if($_SESSION['is_admin'] != 1 || !isset($_POST['orderId'])) {
        header('location: ../dashboard.php');
        exit();
    } else {
        include('../../php/config.php');
        $order_id = $_POST['orderId'];
        $delete_query = "DELETE FROM orders WHERE order_id = $order_id";
        mysqli_query($conn,$delete_query);
        $delete_items_query = "DELETE FROM order_items WHERE order_id = $order_id";
        mysqli_query($conn,$delete_items_query);
    }
?>