<?php
    session_start();
    if($_SESSION['is_admin'] != 1 || !isset($_POST['productId'])) {
        header('location: ../dashboard.php');
        exit();
    } else {
        include('../../php/config.php');
        $product_id = $_POST['productId'];
        $delete_query = "DELETE FROM products WHERE id = $product_id";
        mysqli_query($conn,$delete_query);
    }
?>