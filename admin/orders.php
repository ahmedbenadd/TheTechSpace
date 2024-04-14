<?php
  session_start();
  if(!isset($_SESSION['is_admin'])) {
    header('Location: ../index.php');
    exit();
  }
  include('../php/config.php');
  ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="css/const.css?v=<?php echo time();?>">
    <link rel="icon" type="icon/png" href="../logos/logo-nobg.png">
    <link rel="stylesheet" href="css/orders.css">
  </head>
  <body>
    <div id="menu-toggle-container">
      <div id="header">
        <a href="#">
          <div class="image">
            <img src="../icons/user-solid.svg" alt="Administraror">
          </div>
        </a>
        <a>
          <p class="user_fname"><?php echo $_SESSION['full_name']; ?></p>
        </a>
      </div>
    </div>
    <div id="navbar">
      <div class="logo">
        <a class="logo" href="dashboard.php"><img src="../logos/logo2.png" alt="The TechSpace"></a>
      </div>
      <ul class="ul1">
        <li><a class="dash" href="dashboard.php"><img class="dash" src="../icons/dashboard.png" alt="Dashboard"> Dashboard</a></li>
        <li><a class="customers" href="customers.php"><img class="customers" src="../icons/customers.svg" alt="Customers">Customers</a></li>
        <li>
          <a class="products" id="products" href="products.php"><img class="products" src="../icons/products.svg" alt="Products">Products</a>
        </li>
        <li><a class="orders active" href="orders.php"><img class="orders order-active" src="../icons/orders.svg" alt="Orders">Orders</a></li>
        <li class="logo-navbar"><a class="logo-navbar" href="/TheTechSpace/index.php"><img class="logo-navbar" src="../logos/logo-red-nobg.png" alt="Index">The TechSpace</a></li>
      </ul>
      <a href="#" class="logout" onclick="logout();"><img class="logout" src="../icons/logout.svg" alt="Logout"> Logout</a>
    </div>
    <main>
    <section class="orders-container">
        <div class="title-container">
            <h3>Orders</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>CLIENT NAME</th>
                    <th>CITY</th>
                    <th>PRICE</th>
                    <th>DATE PLACED</th>
                    <th>ACTIONS</th>
                    <th>ITEMS</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $orders_query = "SELECT * from orders";
                    $orders_result = mysqli_query($conn, $orders_query);
                    
                    while ($orders = mysqli_fetch_assoc($orders_result)) {
                ?>
                <tr>
                    <td><?php echo $orders['full_name']; ?></td>
                    <td><?php echo $orders['city']; ?></td>
                    <td><?php echo $orders['total_price']; ?></td>
                    <td><?php echo $orders['order_date']; ?></td>
                    <td>TEST</td>
                    <td class="table-chevron">&#x3009;</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/const.js"></script>
    <script src="../js/logout.js"></script>
  </body>
</html>