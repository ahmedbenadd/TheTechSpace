<?php
include('config.php');
session_start();
$response = array();

if (isset($_SESSION['id']) && isset($_POST['productid'])) {
    $user_id = mysqli_real_escape_string($conn, $_SESSION['id']);
    $product_id = mysqli_real_escape_string($conn, $_POST['productid']);
    $item_quantity = mysqli_real_escape_string($conn, $_POST['item_quantity']);

    $fetch_query = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id";
    $result = mysqli_query($conn, $fetch_query);

    if ($result && mysqli_num_rows($result) == 1) {
        $update_query = "UPDATE cart SET quantity = quantity + $item_quantity WHERE user_id = $user_id AND product_id = $product_id";
        mysqli_query($conn, $update_query);
    } else {
        $insert_query = "INSERT INTO cart (user_id, product_id, quantity) VALUES ($user_id, $product_id, $item_quantity)";
        mysqli_query($conn, $insert_query);
    }

    $cart_fetch_query = "SELECT cart.quantity, products.name, products.img_1, products.price, products.id FROM cart INNER JOIN products ON cart.product_id = products.id WHERE cart.user_id = $user_id";
    $cart_result = mysqli_query($conn, $cart_fetch_query);

    if ($cart_result) {
        if(mysqli_num_rows($cart_result) > 0) {
            $cart_items_html = '';
            $total_price = 0;

            while ($row = mysqli_fetch_assoc($cart_result)) {
                $quantity = $row["quantity"];
                $product_name = htmlspecialchars($row["name"]);
                $product_image = htmlspecialchars($row["img_1"]);
                $product_price = htmlspecialchars($row["price"]);
                $product_id = $row['id'];

                $cart_items_html .= '<div class="cart-item">';
                $cart_items_html .= '<img src="' . $product_image . '" alt="' . $product_name . '" class="cart-item-image">';
                $cart_items_html .= '<div class="cart-item-details">';
                $cart_items_html .= '<h3 class="cart-item-name">' . $product_name . '</h3>';
                $cart_items_html .= '<div class="price-quantity-container">';
                $cart_items_html .= '<span class="cart-item-price">$' . $product_price . '</span>';
                $cart_items_html .= '<div class="quantity-container">';
                $cart_items_html .= '<label for="qty-' . $product_id . '" class="quantity-label">Qty:</label>';
                $cart_items_html .= '<input type="number" id="qty-' . $product_id . '" class="cart-item-quantity" value="' . $quantity . '" max="20" min="1">';
                $cart_items_html .= '<button class="sync-qty-button" data-productid="'. $product_id .'" >';
                $cart_items_html .= '<svg width="28px" height="28px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.3935 5.37371C18.0253 6.70569 19.8979 10.7522 18.5761 14.4118C17.6363 17.0135 15.335 18.7193 12.778 19.0094M12.778 19.0094L13.8253 17.2553M12.778 19.0094L14.4889 20M9.60651 18.6263C5.97465 17.2943 4.10205 13.2478 5.42394 9.58823C6.36371 6.98651 8.66504 5.28075 11.222 4.99059M11.222 4.99059L10.1747 6.74471M11.222 4.99059L9.51114 4" stroke="#464455" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>';
                $cart_items_html .= '</button>';
                $cart_items_html .= '</div>';
                $cart_items_html .= '<button class="remove-item-button" data-productid="'. $product_id .'" >&#x2715;</button>';
                $cart_items_html .= '</div>';
                $cart_items_html .= '</div>';
                $cart_items_html .= '</div>';

                $total_price += $product_price * $quantity;
            }

            $response['status'] = true;
            $response['cart'] = $cart_items_html;

            $cart_summary_html = '<span class="total-items">' . mysqli_num_rows($cart_result) . ' ' . (mysqli_num_rows($cart_result) === 1 ? '<span>Item</span>' : '<span>Items</span>') . '</span>';
            $cart_summary_html .= '<span class="total-price">Total : <span>$' . $total_price . '</span></span>';
            $cart_summary_html .= '<a href="products.php" class="continue-shopping">Browse</a>';
            $cart_summary_html .= '<a class="checkout" href="checkout.php">Checkout</a>';

            $response['cart-summary'] = $cart_summary_html;

        } else {
            $response['status'] = true;
            $response['message'] = "empty_cart";
            $response['cart'] = '<div class="empty-cart"><img src="icons/empty-cart.png" alt="Cart" class="empty-cart-img"><p class="empty-cart-message">Your cart is empty.</p></div>';
        }
    } else {
        $response['status'] = false;
        $response['message'] = 'Failed to fetch cart items.';
    }
} else {
    $response['status'] = false;
    $response['message'] = 'No user is logged.';
}

echo json_encode($response);
?>
