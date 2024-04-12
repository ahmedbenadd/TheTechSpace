<?php
    include('php/config.php');
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/hdr&ftr.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/contact.css?v=<?php echo time(); ?>">
    <link rel="icon" type="icon/png" href="logos/logo-nobg.png">
</head>
<body>
    <header>
        <div id="top-header">
            <ul class="header-links header-links1">
                <li><a><img src="icons/phone-solid.svg" class="icons-top-header">&nbsp; +212 581054154</a></li>
                <li><a><img src="icons/envelope-regular.svg" class="icons-top-header mail-icon">&nbsp; thetechspacecontact@gmail.com</a></li>
                <li><a><img src="icons/location-dot-solid.svg" class="icons-top-header location-icon">&nbsp; Road El Jadida Casablanca</a></li>
            </ul>
            <ul class="header-links header-links2">
                <li class="acc"><a href="login.php"><img src="icons/user-solid.svg" class="icons-top-header">&nbsp;&nbsp;Log In</a></li>
            </ul>
        </div>
        <div id="header">
            <span class="burger-icon">
                <span class="burger-show">
                    <a id="burger-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                        </svg>
                    </a>
                </span>
            </span>
            <a href="index.php" class="logo"><img src="logos/logo1.jpg" alt="The TechSpace logo"></a>
            <nav>
                <ul>
                    <span class="to-hide">
                        <li><a href="index.php">HOME</a></li>
                        <li class="dropdown">
                            <a class="a-categories" href="products.php">CATEGORIES</a>
                            <ul>
                                <li><a href="products.php?cgr=<?php echo base64_encode('Laptops'); ?>">Laptops</a></li>
                                <li><a href="products.php?cgr=<?php echo base64_encode('Smartphones'); ?>">Smartphones</a></li>
                                <li><a href="products.php?cgr=<?php echo base64_encode('Components'); ?>">Components</a></li>
                                <li><a href="products.php?cgr=<?php echo base64_encode('Accessories'); ?>">Accessories</a></li>
                            </ul>
                        </li>
                        <li><a href="products.php">PRODUCTS</a></li>
                        <li><a  class="active" href="contact.php">CONTACT</a></li>
                    </span>
                    <span class="to-keep">
                        <li class="cart-li"><a class="cart-a cart-show" ><img class="cart-icon" src="icons/cart.svg" alt="Cart"></a></li>
                        <li class="cart-li"><a class="cart-a user-a"><img class="user-icon" src="icons/user-solid-2.svg" alt="Account"></a></li>
                    </span>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section class="contact-form">
            <h1 class="sectionHeader">Get In Touch!</h1>
            <div class="contactForm">
                <form action="" method="">
                    <div class="alert alert-3-danger">
                        <h3 class="alert-title" >Email Sent Successfully!</h3>
                        <p class="alert-content">A confirmation email has been sent to: benaddouahmed2005@gmail.com</p>
                    </div>
                    <h1 class="sub-heading">Need Support !</h1>
                    <input name="f_name" id="full_name" type="text" class="input" placeholder="full name" required>
                    <span class="er-name error"></span>
                    <input type="text" id="email" name="email" class="input" placeholder="your email" required>
                    <span class="er-email error"></span>
                    <input type="text" id="subject" name="subject" class="input" placeholder="your Subject" required>
                    <span class="er-subject error"></span>
                    <textarea class="input" id="message" name="message" cols="30" rows="8" placeholder="Your message..." required></textarea>
                    <span class="er-message error"></span>
                    <button type="button" id="send_email" class="input submit" name="submit">Send Message</button>
                </form>
                <div class="map-container">
                    <div class="mapBg"></div>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.4634760241215!2d-7.657725024198199!3d33.541332473353606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda62cdf71a3ad5f%3A0xae343a1ea1f2b204!2sSuperior%20School%20of%20Technology!5e0!3m2!1sen!2sma!4v1710950199971!5m2!1sen!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                    
                    </div>
                </div>
            </div>
        </section>
        <section class="info">
            <h1>Contact Us</h1>
            <div class="details">
                <div class="location-contact">
                    <div class="icon"><img src="icons/location-white.svg" alt="Location"></div>
                    <h5>Adress</h5>
                    <p>Higher School of Technology, Road ElJadida, Casablanca</p>
                </div>
                <div class="email-contact">
                    <div class="icon"><img src="icons/envelope-white.svg" alt="Location"></div>
                    <h5>Email</h5>
                    <p>thetechspace@gmail.com<br>thetechspacecontact@gmail.com</p>
                </div>
                <div class="phone-contact">
                    <div class="icon"><img src="icons/phone-white.svg" alt="Location"></div>
                    <h5>Phone</h5>
                    <p>+212 581 054 154<br>+212 987 654 321</p>
                </div>
            </div>
        </section>
        <div class="to-up">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#d10024" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z"/>
            </svg>
        </div>
        
        <div class="dark-overlay"></div>

        <div class="burger-menu" id="burger-menu">
            <div class="menu-header">
                <h1>MENU</h1>
                <span class="menu-hide">
                    <svg fill="#d10024" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-46.08 -46.08 552.93 552.93" xml:space="preserve" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)" style="margin: auto 0;">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="" stroke-width="11.98015"></g>
                        <g id="SVGRepo_iconCarrier"> 
                            <path d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55 c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55 c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505 c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55 l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719 c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z"></path>
                        </g>
                    </svg>
                </span>
            </div>
            <ul class="burger-nav">
                    <li><a href="index.php">HOME</a></li>
                    <li>
                        <a href="#" class="catg-button">CATEGORIES<span id="cheveron"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.002 45.999"><g xmlns="http://www.w3.org/2000/svg" transform="matrix(-1 0 0 -1 26.002 45.999)"><path d="M24.998 40.094a3.484 3.484 0 0 1 0 4.893 3.404 3.404 0 0 1-4.846 0L1.004 25.447a3.486 3.486 0 0 1 0-4.895L20.152 1.014a3.402 3.402 0 0 1 4.846 0 3.484 3.484 0 0 1 0 4.893L9.295 23l15.703 17.094z" fill="#15161D" class="fill-000000"/></g></svg></span> </a>
                        <ul class = "catg">
                            <li><a href="products.php?cgr=<?php echo base64_encode('Laptops'); ?>"><p>Laptops</p></a></li>
                            <li><a href="products.php?cgr=<?php echo base64_encode('Smartphones'); ?>"><p>Smartphones</p></a></li>
                            <li><a href="products.php?cgr=<?php echo base64_encode('Components'); ?>"><p>Components</p></a></li>
                            <li><a href="products.php?cgr=<?php echo base64_encode('Accessories'); ?>"><p>Accessories</p></a></li>
                        </ul>
                    </li>
                    <li><a href="products.php">PRODUCTS</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                    <span class="down-li logout-span"><li><a href="login.php">LOG IN</a></li></span>
            </ul>
        </div>
        
        <div class="acc-menu">
            <div class="menu-header">
                <h1>ACCOUNT</h1>
                <span class="menu-hide">
                    <svg fill="#d10024" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-46.08 -46.08 552.93 552.93" xml:space="preserve" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)" style="margin: auto 0;">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="" stroke-width="11.98015"></g>
                        <g id="SVGRepo_iconCarrier"> 
                            <path d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55 c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55 c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505 c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55 l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719 c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z"></path>
                        </g>
                    </svg>
                </span>
            </div>
            <?php if(!isset($_SESSION['id'])) { ?>
                <div class="acc-login-message">
                    <p>Hi! It appears you're not logged in. Please <a href="login.php">log in</a> to access your account.</p>
                </div>
            <?php } else { ?>
                <div class="content">
                    <h2 class="acc-name first-name"></h2>
                    <div class="additional-options">
                        <a id="logoutButton" onclick="logout();">Logout</a>
                    </div>
                    <h4 class="acc-title">Personal Information</h4>
                    <form class="acc-data pers-infos" action="" autocomplete="off">
                        <div class="input-group">
                            <label for="acc_full_name">Full Name</label>
                            <input type="text" id="acc_full_name" autocomplete="off" readonly> 
                        </div>
                        <div class="input-group">
                            <label for="acc_email">Email</label>
                            <input type="email" id="acc_email" autocomplete="off" readonly>
                        </div>
                        <div class="input-group">
                            <label for="acc_username">Username</label>
                            <input type="text" id="acc_username" autocomplete="off" readonly>
                        </div>
                    </form>
                    <h4 class="acc-title">Update Your Password</h4>
                    <p class="pass_success">Password Updated Successfully</p>
                    <form class="acc-data pass-form" action="" autocomplete="off">
                        <div class="input-group">
                            <label for="acc_current_password">Current Password</label>
                            <input type="password" id="acc_current_password" autocomplete="off">
                            <p class="acc-error curr-pass-err"></p>
                        </div>
                        <div class="input-group">
                            <label for="acc_new_password">New Password</label>
                            <input type="password" id="acc_new_password" autocomplete="off">
                            <p class="acc-error new-pass-err"></p>
                        </div>
                        <div class="input-group">
                            <label for="acc_confirm_password">Confirm New Password</label>
                            <input type="password" id="acc_confirm_password" autocomplete="off">
                            <p class="acc-error comf-pass-err"></p>
                        </div>
                        <button class="save" id="savePass">SAVE</button>
                    </form>
                </div>
            <?php } ?>
        </div>

        <div class="cart-menu">
            <div class="menu-header">
                <h1>CART</h1>
                <span class="menu-hide">
                    <svg fill="#d10024" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-46.08 -46.08 552.93 552.93" xml:space="preserve" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)" style="margin: auto 0;">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="" stroke-width="11.98015"></g>
                        <g id="SVGRepo_iconCarrier"> 
                            <path d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55 c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55 c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505 c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55 l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719 c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z"></path>
                        </g>
                    </svg>
                </span>
            </div>
            <?php if(!isset($_SESSION['id'])) { ?>
            <div class="cart-login-message">
                <p>Hi! It appears you're not logged in. Please <a href="login.php">log in</a> to access your cart.</p>
            </div>
            <?php } else { ?>
            <div class="cart-content">
                <div class="cart-items-container">
                    <?php
                    $query = "SELECT product_id, quantity FROM cart WHERE user_id = '" . $_SESSION["id"] . "'";
                    $result = mysqli_query($conn, $query);

                    if ($result && $items_num = mysqli_num_rows($result) > 0) {
                        $total_price = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $product_id = $row["product_id"];
                            $quantity = $row["quantity"];

                            $product_query = "SELECT name, img_1, price FROM products WHERE id = '" . $product_id . "'";
                            $product_result = mysqli_query($conn, $product_query);

                            if ($product_result && mysqli_num_rows($product_result) > 0) {
                                $product = mysqli_fetch_assoc($product_result);
                    ?>
                                <div class="cart-item">
                                    <img src="<?php echo $product['img_1']; ?>" alt="<?php echo $product['name']; ?>" class="cart-item-image">
                                    <div class="cart-item-details">
                                        <h3 class="cart-item-name"><?php echo $product['name']; ?></h3>
                                        <div class="price-quantity-container">
                                            <span class="cart-item-price">$<?php echo $product['price']; $total_price += $product['price']*$quantity; ?></span>
                                            <div class="quantity-container">
                                                <label for="qty-<?php echo $product_id; ?>" class="quantity-label">Qty:</label>
                                                <input type="number" id="qty-<?php echo $product_id; ?>" class="cart-item-quantity" value="<?php echo $quantity; ?>" max="20" min="1">
                                                <button class="sync-qty-button">
                                                    <svg width="28px" height="28px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.3935 5.37371C18.0253 6.70569 19.8979 10.7522 18.5761 14.4118C17.6363 17.0135 15.335 18.7193 12.778 19.0094M12.778 19.0094L13.8253 17.2553M12.778 19.0094L14.4889 20M9.60651 18.6263C5.97465 17.2943 4.10205 13.2478 5.42394 9.58823C6.36371 6.98651 8.66504 5.28075 11.222 4.99059M11.222 4.99059L10.1747 6.74471M11.222 4.99059L9.51114 4" stroke="#464455" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                                </button>
                                            </div>
                                        </div>
                                        <button class="remove-item-button" data-productid="<?php echo $row['product_id']; ?>">&#x2715;</button>
                                    </div>
                                </div>
                    <?php
                            }
                            mysqli_free_result($product_result);
                        }
                    ?>
                </div>
                <div class="cart-summary">
                    <span class="total-items">
                        <?php
                            echo mysqli_num_rows($result) . ' ' . (mysqli_num_rows($result) === 1 ? '<span>Item</span>' : '<span>Items</span>');
                            mysqli_free_result($result);
                        ?>
                    </span>
                    <span class="total-price">Total : <span>$<?php echo $total_price; ?></span></span>
                    <a href="products.php" class="continue-shopping">Browse</a>
                    <button class="checkout">Checkout</button>
                </div>
                <?php
                    } else {
                    ?>
                        <div class="empty-cart">
                            <img src="icons/empty-cart.png" alt="Cart" class="empty-cart-img">
                            <p class="empty-cart-message">Your cart is empty.</p>
                        </div>
                    <?php
                    }
                ?>
            </div>
            <?php } ?>
        </div>
        
    </main>
    <footer>
        <div class="top-footer">
            <div class="footer-nav">
                <ul class="footer-links">
                    <li><h5><a href="index.php">HOME</a></h5></li>
                    <li><h5><a href="products.php">PRODUCTS</a></h5></li>
                    <li><h5><a class="active" href="contact.php">CONTACT</a></h5></li>
                    <li class="footer-admin"></li>
                    <li class="copyright">© 2024 TheTechSpace. All Rights Reserved.</li>
                </ul>
            </div>
            <div class="footer-categories">
                <h5>CATEGORIES</h5>
                <ul class="footer-links">
                    <li><a href="#">Laptops</a></li>
                    <li><a href="#">Smartphones</a></li>
                    <li><a href="#">Components</a></li>
                    <li><a href="#">Accessories</a></li>
                </ul>
            </div>
            <div class="about-us">
                <h5>ABOUT US</h5>
                <div class="about-us-content">
                    <p>Welcome to The TechSpace – Discover the latest in electronics, from smartphones to PCs. Shop with ease and enjoy fast nationwide delivery. Experience innovation at The TechSpace today!</p>
                    <ul class="footer-links">
                        <li><a><img src="icons/phone-solid.svg" class="icons-top-header">&nbsp; +212 581054154</a></li>
                        <li><a><img src="icons/envelope-regular.svg" class="icons-top-header mail-icon">&nbsp; thetechspacecontact@gmail.com</a></li>
                        <li><a><img src="icons/location-dot-solid.svg" class="icons-top-header location-icon">&nbsp; Road El Jadida Casablanca</a></li>
                        <li class="copyright"></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bottom-footer"></div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/send_email.js"></script>
    <script src="js/logout.js"></script>
</body>
</html>
