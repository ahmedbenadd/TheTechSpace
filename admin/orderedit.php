<?php
    session_start();
    include('../php/config.php');
    $is_admin_query = "SELECT is_admin FROM users WHERE id = ".$_SESSION['id'];
    $_SESSION['is_admin'] = mysqli_fetch_assoc(mysqli_query($conn, $is_admin_query))['is_admin'];
    if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
        header('Location: ../index.php');
        exit();
    }
    if (isset($_GET['mttd'])) {
        $decoded_param = base64_decode($_GET['mttd']);
        $order_id = substr($decoded_param, 5);
        $order_id = intval($order_id);

        $query = "SELECT * FROM orders WHERE order_id = $order_id";

        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
        } else {
            header('Location: orders.php');
            exit();
        }
    } else {
        header('Location: orders.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['full_name']; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/orderedit.css">
    <link rel="icon" type="icon/png" href="../logos/logo-nobg.png">
</head>
<body>
    <header>
        <div class="logo">
            <a class="logo" href="dashboard.php"><img src="../logos/logo2.png" alt="The TechSpace"></a>
        </div>
        <div class="user">
            <div class="user-image">
                <img src="../icons/user-solid.svg" alt="Administraror">
            </div>
            <p class="user_fname"><?php echo $_SESSION['full_name']; ?></p>
        </div>
    </header>
    <main>
        <div id="navbar">
            <ul>
                <div class="top">
                    <li>
                        <a class="dash" href="dashboard.php">
                            <img class="dash" src="../icons/dashboard.png" alt="Dashboard">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a class="customers" href="customers.php">
                            <img class="customers" src="../icons/customers.svg" alt="Customers">
                            Customers
                        </a>
                    </li>
                    <li>
                        <a class="products" id="products" href="products.php">
                            <img class="products" src="../icons/products.svg" alt="Products">
                            Products
                        </a>
                    </li>
                    <li>
                        <a class="orders active" href="orders.php">
                            <img class="orders orders-active" src="../icons/orders.svg" alt="Orders">
                            Orders
                        </a>
                    </li>
                </div>
                <div class="bottom">
                    <li>
                        <a class="logo-navbar" href="/TheTechSpace/index.php">
                            <img class="logo-navbar" src="../logos/logo-red-nobg.png" alt="Index">
                            The TechSpace
                        </a>
                    </li>
                    <li>
                        <a href="#" class="logout" onclick="logout();">
                            <img class="logout" src="../icons/logout.svg" alt="Logout">
                            Logout
                        </a>
                    </li>
                </div>
            </ul>
        </div>
        <div id="page-content">
            <section id="form-container">
                <div class="order-name">
                    <h3><?php echo $row['full_name']; ?>'s Order</h3>
                    <div class="switch-container">
                        <label class="switch">
                            <input type="checkbox" id="editPasswordCheckbox">
                            <span class="slider"></span>
                        </label>
                        <span class="custom-checkbox-label">Order Items</span>
                    </div>
                </div>
                <form autocomplete="off" id="form">
                    <label for="fullname" class="order-label">Full Name:</label>
                    <input type="text" id="fullname" class="order-input" value="<?php echo $row['full_name']; ?>">
                    <span id="full-name-error" class="error-message"></span>
                    <label for="email" class="order-label">Email::</label>
                    <input type="email" id="email" class="order-input" value="<?php echo $row['email']; ?>">
                    <span id="email-error" class="error-message"></span>
                    <label for="address" class="order-label">Address:</label>
                    <input type="text" id="address" class="order-input" value="<?php echo $row['address'] ;?>">
                    <span id="address-error" class="error-message"></span>
                    <div class="smaller-input">
                        <div class="input-grp">
                            <div class="inner-input-grp">
                                <label for="city" class="order-label">City:</label>
                                <input type="text" id="city" class="order-input" value="<?php echo $row['city']; ?>">
                                <span id="city-error" class="error-message"></span>
                            </div>
                            <div class="inner-input-grp">
                                <label for="zipCode" class="order-label">Zip Code:</label>
                                <input type="number" id="zipCode" class="order-input" value="<?php echo $row['zip_code']; ?>">
                                <span id="zipCode-error" class="error-message"></span>
                            </div>
                        </div>
                        <div class="input-grp">
                            <div class="inner-input-grp">
                                <label for="total-price" class="order-label">Total Price $:</label>
                                <input type="text" id="total_price" class="order-input" value="<?php echo $row['total_price']; ?>" readonly>
                            </div>
                            <div class="inner-input-grp">
                                <label for="order-date" class="order-label">Placed at:</label>
                                <input type="text" id="order-date" class="order-input" value="<?php echo $row['order_date']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="btns">
                        <div class="inner-btns">
                            <button type="button" id="delete-btn" data-orderid="<?php echo $row['order_id']; ?>">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                DELETE
                            </button>
                            <button type="button" class="submit-btn" id="submit-btn" data-orderid="<?php echo $row['order_id']; ?>">
                                <svg width="15px" height="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1716 1C18.702 1 19.2107 1.21071 19.5858 1.58579L22.4142 4.41421C22.7893 4.78929 23 5.29799 23 5.82843V20C23 21.6569 21.6569 23 20 23H4C2.34315 23 1 21.6569 1 20V4C1 2.34315 2.34315 1 4 1H18.1716ZM4 3C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21L5 21L5 15C5 13.3431 6.34315 12 8 12L16 12C17.6569 12 19 13.3431 19 15V21H20C20.5523 21 21 20.5523 21 20V6.82843C21 6.29799 20.7893 5.78929 20.4142 5.41421L18.5858 3.58579C18.2107 3.21071 17.702 3 17.1716 3H17V5C17 6.65685 15.6569 8 14 8H10C8.34315 8 7 6.65685 7 5V3H4ZM17 21V15C17 14.4477 16.5523 14 16 14L8 14C7.44772 14 7 14.4477 7 15L7 21L17 21ZM9 3H15V5C15 5.55228 14.5523 6 14 6H10C9.44772 6 9 5.55228 9 5V3Z" fill="#ffffff"/>
                                </svg>
                                SAVE
                            </button>
                        </div>
                        <a href="orders.php"><span>&#8630;&nbsp; </span> All Orders</a>
                    </div>        
                </form>
                <table id="table">
                        <thead>
                            <tr>
                                <th>DELETE</th>
                                <th>NAME</th>
                                <th>PRICE</th>
                                <th class="refresh">QUANTITY</th>
                                <th class="refresh">REFRESH</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php
                            $items_query = "SELECT * FROM order_items WHERE order_id =". $row['order_id'];
                            $items_result = mysqli_query($conn, $items_query);
                            while ($items = mysqli_fetch_assoc($items_result)) {
                                $name_query = "SELECT name FROM products WHERE id =". $items['product_id'];
                                $name_result = mysqli_query($conn, $name_query);
                                $name = mysqli_fetch_assoc($name_result);
                                echo "<tr>";
                                echo '<td class="remove-item">
                                        <button class="remove-item-button" data-orderid="'. $row['order_id'] .'" data-productid="'. $items['product_id'] .'">&#x2715;</button>
                                    </td>';
                                echo "<th>" . $name['name'] . "</th>";
                                echo "<td>$" . $items['price'] . "</td>";
                                echo '<td class="refresh"><input type="number" class="qty-input" value="' . $items['quantity'] . '"</td>';
                                echo '<td class="refresh syn-button">
                                        <div class="update-qty"  data-orderid="'. $row['order_id'] .'" data-productid="'. $items['product_id'] .'">
                                            <svg  width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                            <path d="M14.3935 5.37371C18.0253 6.70569 19.8979 10.7522 18.5761 14.4118C17.6363 17.0135 15.335 18.7193 12.778 19.0094M12.778 19.0094L13.8253 17.2553M12.778 19.0094L14.4889 20M9.60651 18.6263C5.97465 17.2943 4.10205 13.2478 5.42394 9.58823C6.36371 6.98651 8.66504 5.28075 11.222 4.99059M11.222 4.99059L10.1747 6.74471M11.222 4.99059L9.51114 4" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round">
                                            </path> 
                                            </g>
                                            </svg>
                                        </div>
                                    </td>';
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
            </section>
        </div>
    </main>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <svg width="55px" height="55px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#f15e5e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>				
                    <h4 class="modal-title">Are you sure?</h4>	
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete this account <span id="user-to-delete"></span> . This process cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal" id="cancel">Cancel</button>
                    <button type="button" class="btn btn-danger" id="delete">Delete</button>
                </div>
            </div>
        </div>
    </div> 
    <div class="dark-overlay"></div>   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/orderedit.js"></script>
    <script src="../js/logout.js"></script>
</body>
</html>