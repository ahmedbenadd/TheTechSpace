<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/hdr&ftr.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/index.css">
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
                    <li><a class="active" href="index.php">HOME</a></li>
                    <li class="dropdown">
                        <a class="a-categories" href="#">CATEGORIES</a>
                        <ul>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">Smartphones</a></li>
                            <li><a href="#">Components</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </li>
                    <li><a href="products.php">PRODUCTS</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                    </span>
                    <span class="to-keep">
                        <li class="cart-li cart-show" ><a class="cart-a " ><img class="cart-icon" src="icons/cart.svg" alt="Cart"></a></li>
                        <li class="cart-li user-a"><a class="cart-a "><img class="user-icon" src="icons/user-solid-2.svg" alt="Account"></a></li>
                    </span>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <h2 class="BESTSELLER">BESTSELLER</h2>
        <section class="wrapper">
            <div class="product-img">
              <img src="images/i9.jpg" height="280" width="290">
            </div>
            <div class="product-info">
              <div class="product-text">
                <h1>Intel Core i9 13th Gen</h1>
                <p>
                    Intel Core i9 13900KF (3.0 GHz / 5.8 GHz)<br>
                    <strong>Brand </strong>&nbsp;Intel<br>
                    <strong>CPU Model </strong>&nbsp;Core I9<br>
                    <strong>CPU Frequency </strong>&nbsp;3.0 Ghz<br>
                    <strong>CPU Turbo mode frequency </strong>&nbsp;5.8 GHz<br>
                    <strong>Cores </strong>&nbsp;24<br>
                    <strong>Threads </strong>&nbsp;32<br>
                </p>
              </div>
              <div class="product-price-btn">
                <p>566.60$</p>
                <button type="button">add to cart</button>
              </div>
            </div>
        </section>
        <section class="products">
            <h2 class="products-h2">LATEST PRODUCTS</h2>
            <div class="row1">
                <div class="product-card macbook">
                    <h3>MacBook Pro M3 14"</h3>
                    <div class="info-product">
                        <div class="image">
                            <img src="images/mcbkpro-m3.jpg" alt="MacBook Pro M3">
                        </div>
                        <p class="p-product">M3 Pro chip 12‑core CPU 8‑core GPU, 1TB SSD</p>
                    </div>
                    <div class="price">
                        <span>$2,399.00</span>
                        <button type="button" class="price-button">add to cart</button>
                    </div>
                </div>
                <div class="product-card s24ultra">
                    <h3>SAMSUNG Galaxy S24 Ultra</h3>
                    <div class="info-product">
                        <div class="image">
                             <img src="images/galaxys24ultra.svg" alt="S24 Ultra">
                         </div>
                        <p>Snapdragon 8 Gen 3, 12GB, 256GB</p>
                    </div>
                    <div class="price">
                        <span>$1,299.99</span>
                        <button type="button" class="price-button">add to cart</button>
                    </div>
                </div>
                <div class="product-card RTX3070">
                    <h3>Gigabyte GeForce RTX 4070</h3>
                    <div class="info-product">
                        <div class="image">
                            <img src="images/RTX3070.jpg" alt="RTX 4070">
                        </div>
                        <p>NVIDIA GeForce RTX 4070 12GB GDDR6X</p>
                    </div>
                    <div class="price">
                        <span>$699</span>
                        <button type="button" class="price-button">add to cart</button>
                    </div>
                </div>
            </div>
            <div class="row2">
                <div class="product-card LogitechG502">
                    <h3>Logitech G502 Hero RGB</h3>
                    <div class="info-product">
                        <div class="image">
                            <img src="images/LogitechG502.jpg" alt="Logitech G502">
                        </div>
                        <p>Optical mouse, DPI 25600, RGB, 121g</p>
                    </div>
                    <div class="price">
                        <span>$79.99</span>
                        <button type="button" class="price-button">add to cart</button>
                    </div>
                </div>
                <div class="product-card dell-xps">
                    <h3>Dell XPS 15 - 9510</h3>
                    <div class="info-product">
                        <div class="image">
                            <img src="images/dellxps.jpg" alt="Dell XPS 15">
                        </div>
                        <p>i7-11800H/16 GB/1TB SSD/RTX3050Ti /15.6" FHD+</p>
                    </div>
                    <div class="price">
                        <span>$1,099</span>
                        <button type="button" class="price-button">add to cart</button>
                    </div>
                </div>
                <div class="product-card razer">
                    <h3>Razer Blackshark V2 X</h3>
                    <div class="info-product">
                        <div class="image">
                            <img src="images/razer.jpg" alt="Product 1">
                        </div>
                        <p>Black,Wired - 3.5 mm audio jack, 7.1 Virtual Surround</p>
                    </div>
                    <div class="price">
                        <span>$49.99</span>
                        <button type="button" class="price-button">add to cart</button>
                    </div>
                </div>
            </div>
        </section>
        <div class="view-all-button">
            <a href="products.php">View All Products</a>
        </div>
        <h2 class="why-us-h">WHY SHOP WITH US</h2>
        <section class="why-us">
            <div class="details">
                <img src="icons/fast-del.svg" alt="Fast delivery">
                <h4>Fast Delivery</h4>
                <p>Lightning-fast delivery guaranteed!</p>
            </div>
            <div class="details">
                <img src="icons/free.svg" alt="Free shiping">
                <h4>Free Shiping</h4>
                <p>Shipping's on us, every time.</p>
            </div>
            <div class="details">
                <img class="bestquality-icon" src="icons/bestquality.png" alt="Best quality">
                <h4>Best Quality</h4>
                <p>Best quality guaranteed with every product.</p>
            </div>
        </section>
        <div class="to-up">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#d10024" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z"/>
            </svg>
        </div>

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
                            <li><a href="#"><p>Laptops</p></a></li>
                            <li><a href="#"><p>Smartphones</p></a></li>
                            <li><a href="#"><p>Components</p></a></li>
                            <li><a href="#"><p>Accessories</p></a></li>
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
            <div class="login-message">
                <p>Hi! It appears you're not logged in. Please <a href="login.php">log in</a> to access your account.</p>
            </div>
            <div class="content">
                <h2 class="acc-name first-name"></h2>
                <div class="additional-options">
                    <a id="logoutButton" onclick="logout();">Logout</a>
                </div>
                <h4 class="acc-title">Personal Information</h4>
                <form class="acc-data" action="" autocomplete="off">
                    <div class="input-group">
                        <label for="acc_full_name">Full Name</label>
                        <input type="text" id="acc_full_name" autocomplete="off">
                        <p class="acc-error"></p>
                    </div>
                    <div class="input-group">
                        <label for="acc_email">Email</label>
                        <input type="email" id="acc_email" autocomplete="off">
                        <p class="acc-error"></p>
                    </div>
                    <div class="input-group">
                        <label for="acc_username">Username</label>
                        <input type="text" id="acc_username" autocomplete="off">
                        <p class="acc-error"></p>
                    </div>
                    <div class="input-group">
                        <label for="shipping_address">Shipping Address</label>
                        <input type="text" id="shipping_adress" autocomplete="off">
                    </div>
                    <div class="input-group">
                        <label for="acc_password">Password</label>
                        <input type="password" id="acc_password" autocomplete="off">
                        <p class="acc-error"></p>
                    </div>
                    <input type="button" value="SAVE" class="save">
                </form>
                <h4 class="acc-title">Password</h4>
                <form class="acc-data" action="" autocomplete="off">
                    <div class="input-group">
                        <label for="acc_current_password">Current Password</label>
                        <input type="password" id="acc_current_password" autocomplete="off">
                        <p class="acc-error"></p>
                    </div>
                    <div class="input-group">
                        <label for="acc_new_password">New Password</label>
                        <input type="password" id="acc_new_password" autocomplete="off">
                        <p class="acc-error"></p>
                    </div>
                    <div class="input-group">
                        <label for="acc_confirm_password">Confirm New Password</label>
                        <input type="password" id="acc_confirm_password" autocomplete="off">
                        <p class="acc-error"></p>
                    </div>
                    <input type="button" value="SAVE" class="save">
                </form>
                <div class="additional-options">
                    <a id="logoutButton" onclick="logout();">Logout</a>
                </div>
            </div>
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
            <h4 style="color: black; text-align:center;margin-top: 50px;">Your cart is empty.</h4>
        </div>

        <div class="dark-overlay"></div>

    </main>
    <footer>
        <div class="top-footer">
            <div class="footer-nav">
                <ul class="footer-links">
                    <li><h5><a class="active" href="index.php">HOME</a></h5></li>
                    <li><h5><a href="#">MY ACCOUNT</a></h5></li>
                    <li><h5><a href="products.php">PRODUCTS</a></h5></li>
                    <li><h5><a href="contact.php">CONTACT</a></h5></li>
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
    <script src="js/logout.js"></script>
</body>
</html>