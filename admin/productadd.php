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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/productadd.css">
    <title>New Product</title>
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
                        <a class="products active" id="products" href="products.php">
                            <img class="products prod-active" src="../icons/products.svg" alt="Products">
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
            <section id="form-container">
                <div class="product-name">
                    <h3>New Product</h3>
                </div>
                <form autocomplete="off">
                    <label for="fullname" class="product-label">Name:</label>
                    <input type="text" id="name" class="product-input">
                    <span id="name-error" class="error-message"></span>
                    <label for="Category" class="product-label">Category:</label>
                    <select id="category" class="product-input">
                        <option value="none" selected>Select a category</option>
                        <option value="Laptops">Laptops</option>
                        <option value="Smartphones">Smartphones</option>
                        <option value="Accessories">Accessories</option>
                        <option value="Components">Components</option>
                    </select>
                    <span id="category-error" class="error-message"></span>
                    <label for="description" class="product-label">Description:</label>
                    <textarea id="description" cols="30" rows="2" class="product-input" style="resize: none;"></textarea>
                    <span id="description-error" class="error-message"></span>
                    <label for="longdescription" class="product-label">Long description:</label>
                    <textarea id="longdescription" cols="30" rows="5" class="product-input" style="resize: none;"></textarea>
                    <span id="longdescription-error" class="error-message"></span>
                    <div class="smaller-input">
                        <div class="input-grp">
                            <div class="inner-input-grp">
                                <label for="price" class="product-label">Price $:</label>
                                <input type="number" id="price" class="product-input">
                                <span id="price-error" class="error-message"></span>
                            </div>
                            <div class="inner-input-grp">
                                <label for="quantity" class="product-label">Quantity:</label>
                                <input type="number" id="quantity" class="product-input">
                                <span id="quantity-error" class="error-message"></span>
                            </div>
                        </div>
                        <div class="input-grp">
                            <div class="inner-input-grp">
                                <label for="img_1" class="product-label">Image 1:</label>
                                <input type="text" id="img_1" class="product-input">
                                <span id="img1-error" class="error-message"></span>
                            </div>
                            <div class="inner-input-grp">
                                <label for="img_2" class="product-label">Image 2:</label>
                                <input type="text" id="img_2" class="product-input">
                                <span id="img2-error" class="error-message"></span>
                            </div>
                        </div>
                        <div class="input-grp">
                            <div class="inner-input-grp">
                                <label for="img_3" class="product-label">Image 3:</label>
                                <input type="text" id="img_3" class="product-input">
                                <span id="img3-error" class="error-message"></span>
                            </div>
                            <div class="inner-input-grp">
                                <label for="img_4" class="product-label">Image 4:</label>
                                <input type="text" id="img_4" class="product-input">
                                <span id="img4-error" class="error-message"></span>
                            </div>
                        </div>
                    </div>
                    <div class="btns">
                        <a href="products.php"><span>&#8630;&nbsp; </span> Go Back</a>
                        <button type="button" class="submit-btn" id="submit-btn" data-productid="<?php echo $row['id']; ?>">
                            <svg width="15px" height="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1716 1C18.702 1 19.2107 1.21071 19.5858 1.58579L22.4142 4.41421C22.7893 4.78929 23 5.29799 23 5.82843V20C23 21.6569 21.6569 23 20 23H4C2.34315 23 1 21.6569 1 20V4C1 2.34315 2.34315 1 4 1H18.1716ZM4 3C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21L5 21L5 15C5 13.3431 6.34315 12 8 12L16 12C17.6569 12 19 13.3431 19 15V21H20C20.5523 21 21 20.5523 21 20V6.82843C21 6.29799 20.7893 5.78929 20.4142 5.41421L18.5858 3.58579C18.2107 3.21071 17.702 3 17.1716 3H17V5C17 6.65685 15.6569 8 14 8H10C8.34315 8 7 6.65685 7 5V3H4ZM17 21V15C17 14.4477 16.5523 14 16 14L8 14C7.44772 14 7 14.4477 7 15L7 21L17 21ZM9 3H15V5C15 5.55228 14.5523 6 14 6H10C9.44772 6 9 5.55228 9 5V3Z" fill="#ffffff"/>
                            </svg>
                            SAVE
                        </button>
                    </div>        
                </form>
            </section>
        </div>
    </main> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/productadd.js"></script>
    <script src="../js/logout.js"></script>
</body>
</html>
