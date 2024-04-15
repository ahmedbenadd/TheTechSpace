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
    <title>Customers</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/customers.css">
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
                        <a class="customers active" href="customers.php">
                            <img class="customers cust-active" src="../icons/customers.svg" alt="Customers">
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
            <section class="table-container">
                <div class="title">
                    <h3>Customers</h3>
                </div>
                    <table id="table">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>USERNAME</th>
                                <th>CREATED AT</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php
                            $users_query = "SELECT * FROM users";
                            $users_result = mysqli_query($conn, $users_query);
                            while ($users = mysqli_fetch_assoc($users_result)) {
                                echo "<tr>";
                                echo "<th>" . $users['full_name'] . "</th>";
                                echo "<td>" . $users['email'] . "</td>";
                                echo "<td>" . $users['username'] . "</td>";
                                echo "<td>" . $users['created_at'] . "</td>";
                                echo '<td class="actions">
                                        <div class="trash" data-userid="'.$users['id'].'">
                                            <svg width="23px" height="23px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#d10024" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="edit" data-userid="'.$users['id'].'">
                                            <a href="useredit.php?notw=' . base64_encode('sama=' . $users['id']) . '">
                                                <svg width="21px" height="21px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <title/>
                                                    <g id="Complete"><g id="edit"><g>
                                                        <path d="M20,16v4a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V6A2,2,0,0,1,4,4H8" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                        <polygon fill="none" points="12.5 15.8 22 6.2 17.8 2 8.3 11.5 8 16 12.5 15.8" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                    </g></g></g>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>';

                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="pagination-container" id="table-pagination-container">
                        <div id="table-pagination" class="pagination"></div>
                    </div>
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
    <script src="js/customers.js"></script>
    <script src="../js/logout.js"></script>
  </body>
</html>