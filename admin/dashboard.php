<?php
    session_start();
    include('../php/config.php');
    $is_admin_query = "SELECT is_admin FROM users WHERE id = ".$_SESSION['id'];
    $_SESSION['is_admin'] = mysqli_fetch_assoc(mysqli_query($conn, $is_admin_query))['is_admin'];
    if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
        header('Location: ../index.php');
        exit();
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
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
                        <a class="dash active" href="dashboard.php">
                            <img class="dash dash-active" src="../icons/dashboard.png" alt="Dashboard">
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
                        <a class="orders" href="orders.php">
                            <img class="orders" src="../icons/orders.svg" alt="Orders">
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
            <div class="content-container">
                <div class="statistics">
                    <a href="products.php" class="stats">
                        <?php
                            $products_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));
                            echo "<p class='count'>$products_count</p>";
                            echo "<p class='category'>Products</p>";
                        ?>
                    </a>

                    <a href="customers.php" class="stats">
                        <?php
                            $users_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));
                            echo "<p class='count'>$users_count</p>";
                            echo "<p class='category'>Users</p>";
                        ?>
                    </a>

                    <a href="orders.php" class="stats">
                        <?php
                            $orders_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders"));
                            echo "<p class='count'>$orders_count</p>";
                            echo "<p class='category'>Orders</p>";
                        ?>
                    </a>
                </div>
                <?php
                    $latest_order_query = "SELECT * FROM orders ORDER BY order_date DESC LIMIT 1";
                    $latest_order_result = mysqli_query($conn, $latest_order_query);
                    $latest_order = mysqli_fetch_assoc($latest_order_result);

                    $latest_customer_query = "SELECT * FROM users ORDER BY created_at DESC LIMIT 1";
                    $latest_customer_result = mysqli_query($conn, $latest_customer_query);
                    $latest_customer = mysqli_fetch_assoc($latest_customer_result);
                ?>

                <a class="latest-order" href="orderedit.php?mttd=<?php echo isset($latest_order['order_id']) ? base64_encode('cbdv=' . $latest_order['order_id']) : ''; ?>">
                    <h2>Latest Order</h2>
                    <?php
                        if ($latest_order_result && mysqli_num_rows($latest_order_result) > 0) {
                            echo "<p>Customer: <span>" . $latest_order['full_name'] . "</span></p>";
                            echo "<p>City: <span>" . $latest_order['city'] . "</span></p>";
                            echo "<p>Price: <span>$" . $latest_order['total_price'] . "</span></p>";
                            echo "<p>Order Date: <span>" . $latest_order['order_date'] . "</span></p>";
                        } else {
                            echo "<p>No orders found.</p>";
                        }
                    ?>
                </a>

                <a class="latest-customer" href="useredit.php?notw=<?php echo isset($latest_customer['id']) ? base64_encode('sama=' . $latest_customer['id']) : ''; ?>">
                    <h2>Latest Signed Up Customer</h2>
                    <?php
                        if ($latest_customer_result && mysqli_num_rows($latest_customer_result) > 0) {
                            echo "<p>Name: <span>" . $latest_customer['full_name'] . "</span></p>";
                            echo "<p>Email: <span>" . $latest_customer['email'] . "</span></p>";
                            echo "<p>Username: <span>" . $latest_customer['username'] . "</span></p>";
                            echo "<p>Signup Date: <span>" . $latest_customer['created_at'] . "</span></p>";
                        } else {
                            echo "<p>No customers found.</p>";
                        }
                    ?>
                </a>

            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/logout.js"></script>
  </body>
</html>