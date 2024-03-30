<?php
  session_start();
  if(!isset($_SESSION['is_admin'])) {
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
    <link rel="stylesheet" href="css/const.css?v=<?php echo time();?>">
    <link rel="icon" type="icon/png" href="../logos/logo-nobg.png">
  </head>
  <body>
    <div id="menu-toggle-container">
      <div id="menu-toggle">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div id="header">
        <a href="#">
          <div class="image">
            <img src="../icons/user-solid.svg" alt="Administraror">
          </div>
        </a>
        <a href="#">
          <p class="user_fname"></p>
        </a>
      </div>
    </div>

    <div id="navbar">
      <div class="logo">
        <a class="logo" href="dashboard.php"><img src="../logos/logo2.png" alt="The TechSpace"></a>
      </div>
      <ul class="ul1">
        <li><a class="dash" href="dashboard.php"><img class="dash" src="../icons/dashboard.png" alt="Dashboard"> Dashboard</a></li>
        <li><a class="customers"><img class="customers" src="../icons/customers.svg" alt="Customers">Customers</a></li>
        <li>
          <a class="products" id="products"><img class="products" src="../icons/products.svg" alt="Products">Products<img id="cheveron" class="cheveron" src="../icons/cheveron-right.svg" alt=""></a>
          <ul class="ul2">
            <li><a href="#"><p>Preview</p></a></li>
            <li><a href="#"><p>Add</p></a></li>
            <li><a href="#"><p>Update</p></a></li>
            <li><a href="#"><p>Delete</p></a></li>
          </ul>
        </li>
        <li><a class="orders" href="#"><img class="orders" src="../icons/orders.svg" alt="Orders">Orders</a></li>
        <li class="logo-navbar"><a class="logo-navbar" href="/TheTechSpace/index.php"><img class="logo-navbar" src="../logos/logo-red-nobg.png" alt="Index">The TechSpace</a></li>
      </ul>
      <a href="#" class="logout" onclick="logout();"><img class="logout" src="../icons/logout.svg" alt="Logout"> Logout</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/const.js"></script>
    <script src="../js/logout.js"></script>
  </body>
</html>