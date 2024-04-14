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
    <title>Customers</title>
    <link rel="stylesheet" href="css/const.css?v=<?php echo time();?>">
    <link rel="icon" type="icon/png" href="../logos/logo-nobg.png">
    <link rel="stylesheet" href="css/customers.css">
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
        <li><a class="customers active" href="customers.php"><img class="customers cust-active" src="../icons/customers.svg" alt="Customers">Customers</a></li>
        <li>
          <a class="products" id="products" href="products.php"><img class="products" src="../icons/products.svg" alt="Products">Products</a>
        </li>
        <li><a class="orders" href="orders.php"><img class="orders" src="../icons/orders.svg" alt="Orders">Orders</a></li>
        <li class="logo-navbar"><a class="logo-navbar" href="/TheTechSpace/index.php"><img class="logo-navbar" src="../logos/logo-red-nobg.png" alt="Index">The TechSpace</a></li>
      </ul>
      <a href="#" class="logout" onclick="logout();"><img class="logout" src="../icons/logout.svg" alt="Logout"> Logout</a>
    </div>
    <main>
    <section class="orders-container">
        <div class="title-container">
            <h3>Customers</h3>
        </div>
        <table id="users-table">
              <thead>
                  <tr>
                      <th>NAME</th>
                      <th>EMAIL</th>
                      <th>USERNAME</th>
                      <th>PASSWORD</th>
                      <th>CREATED AT</th>
                      <th>ACTIONS</th>
                  </tr>
              </thead>
              <tbody id="users-table-body">
                  <!-- Populate table rows dynamically using PHP -->
                  <?php
                  $users_query = "SELECT * FROM users";
                  $users_result = mysqli_query($conn, $users_query);
                  while ($users = mysqli_fetch_assoc($users_result)) {
                      echo "<tr>";
                      echo "<td>" . $users['full_name'] . "</td>";
                      echo "<td>" . $users['email'] . "</td>";
                      echo "<td>" . $users['username'] . "</td>";
                      echo "<td>" . $users['password'] . "</td>";
                      echo "<td>" . $users['created_at'] . "</td>";
                      echo "<td>ACTIONS</td>";
                      echo "</tr>";
                  }
                  ?>
              </tbody>
              </table>
        <div class="pagination" id="users-table-pagination">
              <!-- Placeholder for pagination links -->
              </div>
    </section>
</main>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/const.js"></script>
    <script src="../js/logout.js"></script>
  </body>
</html>