<?php
session_start();

if ($_SESSION['is_admin'] != 1 || !isset($_POST['orderId'])) {
    header('Location: ../index.php');
    exit();
} else {
    include('../../php/config.php');
    $order_id = $_POST['orderId'];
    $full_name = $_POST['fullName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zipCode = $_POST['zipCode'];

    $update_query = "UPDATE SET full_name";
    $update_query = "UPDATE orders SET full_name='$full_name', email='$email', address='$address', city='$city', zip_code='$zipCode' WHERE order_id = '$order_id'";
    mysqli_query($conn ,$update_query);
}
?>
