<?php
include("config.php");
session_start();
$response = array();

if(isset($_SESSION['id'])) {
    $user_id = mysqli_real_escape_string($conn, $_SESSION['id']);
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $zip_code = mysqli_real_escape_string($conn, $_POST['zip_code']);

    $insert_order_query = "INSERT INTO orders (user_id, full_name, email, address, city, zip_code) VALUES ('$user_id', '$full_name', '$email', '$address', '$city', '$zip_code')";
    $insert_order_result = mysqli_query($conn, $insert_order_query);

    if($insert_order_result) {
        $order_id = mysqli_insert_id($conn);
        $cart_fetch_query = "SELECT * FROM cart WHERE user_id = $user_id";
        $cart_result = mysqli_query($conn, $cart_fetch_query);
        $total_order_price = 0;

        while($cart = mysqli_fetch_assoc($cart_result)) {
            $product_id = $cart['product_id'];
            $quantity = $cart['quantity'];

            $check_quantity_query = "SELECT quantity FROM products WHERE id = $product_id";
            $check_quantity_result = mysqli_query($conn, $check_quantity_query);
            $available_quantity = mysqli_fetch_assoc($check_quantity_result)['quantity'];

            if($quantity > $available_quantity) {
                $response['status'] = false;
                $response['product'] = $product_id;
                $response['qty'] = $available_quantity;
                $response['message'] = "ins_qty";
                echo json_encode($response);
                exit();
            }

            $update_product_query = "UPDATE products SET quantity = quantity - $quantity WHERE id = $product_id";
            $update_product_result = mysqli_query($conn, $update_product_query);

            if(!$update_product_result) {
                $response['status'] = false;
                $response['message'] = "Error updating product quantity: " . mysqli_error($conn);
                echo json_encode($response);
                exit();
            }

            $get_product_query = "SELECT price FROM products WHERE id = '$product_id'";
            $get_product_result = mysqli_query($conn, $get_product_query);
            $product_row = mysqli_fetch_assoc($get_product_result);
            $price = $product_row['price'];
            $total_price = $price * $quantity;
            $total_order_price += $total_price; 

            $insert_order_item_query = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ('$order_id', '$product_id', '$quantity', '$total_price')";
            $insert_order_item_result = mysqli_query($conn, $insert_order_item_query);
        }

        $update_order_total_query = "UPDATE orders SET total_price = '$total_order_price' WHERE order_id = '$order_id'";
        $update_order_total_result = mysqli_query($conn, $update_order_total_query);

        $delete_cart_query = "DELETE FROM cart WHERE user_id = $user_id";
        $delete_cart_result = mysqli_query($conn, $delete_cart_query);

        $response['status'] = true;
        $response['message'] = "Order placed successfully!";
    } else {
        $response['status'] = false;
        $response['message'] = "Error placing order: " . mysqli_error($conn);
    }
} else {
    $response['status'] = false;
    $response['message'] = "User not logged in";
}

echo json_encode($response);
?>
