// __________ GETTING USER DATA __________//

function checkLogin(userData) {
    if (userData && userData.login) {
        return true;
    } else {
        return false;
    }
}

function fetchAndStoreUserData() {
    $.ajax({
        url: "php/user_data.php",
        type: "POST",
        success: function(data){ 
            var responseData = JSON.parse(data);
            if (responseData.login) {
                localStorage.setItem('userData', JSON.stringify(responseData));

                let userData = JSON.parse(localStorage.getItem('userData'));
                if (checkLogin(userData)) {
                    document.querySelector('.acc').innerHTML = `<a style="cursor: default;"><img src="icons/user-solid.svg" class="icons-top-header">&nbsp;&nbsp;${userData['full_name']}</a>`;
                    document.querySelector('.user-a').setAttribute('href', '#');
                    document.querySelector('.down-li').innerHTML = '<li><a class="logout-button">LOG OUT</a></li>';      
                    if (userData['is_admin'] == 1) {
                            document.querySelector('.down-li').innerHTML = '<li><a href="../admin/dashboard.php" target="_blank">ADMINISTRATION</a></li><li><a href="#" class="logout-button">LOG OUT</a></li>';
                            document.querySelector('.footer-admin').innerHTML = '<h5><a href="/TheTechSpace/admin/dashboard.php" target="_blank">ADMINISTRATION</a></h5>';
                    }
                    document.querySelector('.logout-button').addEventListener('click', function(event) {
                        event.preventDefault(event);

                        $.ajax({
                            url: "php/logout.php",
                            type: "POST",
                            success: function(data){ 
                                console.log('Logout successful');
                                localStorage.clear();
                                window.location.href = 'index.php';
                            },
                            error: function(xhr, status, error){
                                console.log('Error during logout:', error);
                                localStorage.clear();
                                window.location.href = 'index.php';
                            }
                        });
                    });
                }
            }
        },
        error: function(xhr, status, error){
            console.log('ERROR IN PHP USER DATA');
        }
    });
}

fetchAndStoreUserData();

// __________ SCROLL TO UP BTN __________//

let toUp = document.querySelector(".to-up");

window.onscroll = function () {
    this.scrollY >= 400 ? toUp.classList.add("to-up-show") : toUp.classList.remove("to-up-show");
}

toUp.onclick = function () {
    window.scrollTo ({
        top: 0,
        behavior: "smooth",
    });
}

// __________ BURGER MENU __________//

let burgerShow = document.querySelector(".burger-show");
let burgerMenu = document.querySelector(".burger-menu");
let burgerCat = document.querySelector(".catg-button");

burgerShow.onclick = function () {
    burgerMenu.classList.add("burger-menu-showed");
    darkOverlay.style.display = "block";
}

burgerCat.addEventListener("click" , function () {
    let catg = document.querySelector(".catg");
    let cheveron = document.querySelector("#cheveron");
    catg.classList.toggle("catg-showed");
    cheveron.classList.toggle("cheveron-rotated");
}); 

// __________ ACC MENU __________//

let accShow = document.querySelector('.user-a');
let accMenu = document.querySelector('.acc-menu');

accShow.onclick = function () {
    accMenu.classList.add('acc-menu-showed');
    darkOverlay.style.display = "block";
}

// __________ CART MENU __________//

let cartShow = document.querySelector('.cart-show');
let cartMenu = document.querySelector('.cart-menu');

cartShow.onclick = function () {
    cartMenu.classList.add('cart-menu-showed');
    darkOverlay.style.display = "block";
}

// __________ MENUS __________//

let menuHeaders = document.querySelectorAll('.menu-header');
let darkOverlay = document.querySelector('.dark-overlay');

function hideMenus() {
    darkOverlay.style.display = "none";
    burgerMenu.classList.remove("burger-menu-showed");
    accMenu.classList.remove("acc-menu-showed");
    cartMenu.classList.remove('cart-menu-showed');
}

menuHeaders.forEach(menuHeader => {
    menuHeader.addEventListener('click', hideMenus);
});

darkOverlay.addEventListener("click", function () {
    darkOverlay.style.display = "none";
    burgerMenu.classList.remove("burger-menu-showed");
    accMenu.classList.remove("acc-menu-showed");
    cartMenu.classList.remove('cart-menu-showed');
});