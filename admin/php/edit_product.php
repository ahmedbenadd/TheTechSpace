<?php
session_start();
$response = array();

if ($_SESSION['is_admin'] != 1 ) {
    $response['status'] = false;
    $response['message'] = "Unauthorized access";
} else {
    include('../../php/config.php');
    if($_POST['action'] == "add") {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $longDescription = $_POST['longDescription'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $img1 = $_POST['img1'];
        $img2 = $_POST['img2'];
        $img3 = $_POST['img3'];
        $img4 = $_POST['img4'];

        $add_query = "INSERT INTO products (name, category, description, long_description, price, quantity, img_1, img_2, img_3, img_4) VALUES ('$name', '$category', '$description', '$longDescription', '$price', '$quantity', '$img1', '$img2', '$img3', '$img4')";

        if (mysqli_query($conn, $add_query)) {
            $response['status'] = true;
            $response['message'] = "Product added successfully";
        } else {
            $response['status'] = false;
            $response['message'] = "Error adding product: " . mysqli_error($conn);
        }
    } else {
        $product_id = $_POST['productId'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $longDescription = $_POST['longDescription'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $img1 = $_POST['img1'];
        $img2 = $_POST['img2'];
        $img3 = $_POST['img3'];
        $img4 = $_POST['img4'];

        $update_query = "UPDATE products SET name='$name', category='$category', description='$description', long_description='$longDescription', price='$price', quantity='$quantity', img_1='$img1', img_2='$img2', img_3='$img3', img_4='$img4' WHERE id = $product_id";
        
        if (mysqli_query($conn, $update_query)) {
            $response['status'] = true;
            $response['message'] = "Product updated successfully";
        } else {
            $response['status'] = false;
            $response['message'] = "Error updating product: " . mysqli_error($conn);
        }
    }
}

echo json_encode($response);
?>
