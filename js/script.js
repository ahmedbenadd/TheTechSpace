document.addEventListener("DOMContentLoaded", function() {
// __________ GETTING USER DATA __________//

function checkLogin(userData) {
    if (userData && userData.login) {
        return true;
    } else {
        return false;
    }
}

var userData;

$.ajax({
    url: "php/user_data.php",
    type: "POST",
    success: function(data){ 
        var responseData = JSON.parse(data);
        localStorage.setItem('userData', JSON.stringify(responseData));
        
    },
    error: function(xhr, status, error){
        console.log('ERROR IN PHP USER DATA');
    },
    complete: function () {
        userData = JSON.parse(localStorage.getItem('userData'));
        if (userData.login) {
            document.querySelector('.login-message').style.display = "none";
            document.querySelector('.content').style.display = "block";
            document.querySelector('.acc').innerHTML = `<a style="cursor: default;"><img src="icons/user-solid.svg" class="icons-top-header">&nbsp;&nbsp;${userData.full_name}</a>`;
            document.querySelector('.user-a').setAttribute('href', '#');
            document.querySelector('.down-li').innerHTML = '<li><a class="logout-button" onclick="logout();">LOG OUT</a></li>';
            document.querySelector('.first-name').innerHTML = `Hi, ${userData.full_name.split(" ")[0]}`;
            document.querySelector('#acc_full_name').value = userData.full_name;
            document.querySelector('#acc_email').value = userData.email;
            document.querySelector('#acc_username').value = userData.email;
            document.querySelector('#shipping_adress').value = userData.shipping_adress;      
            if (userData['is_admin'] == 1) {
                document.querySelector('.additional-options').innerHTML += '<a id="administratorButton" href="/TheTechSpace/admin/dashboard.php">Administration</a>';
                document.querySelector('.down-li').innerHTML = '<li><a href="admin/dashboard.php">ADMINISTRATION</a></li><li><a href="#" onclick="logout();" class="logout-button">LOG OUT</a></li>';
                document.querySelector('.footer-admin').innerHTML = '<h5><a href="/TheTechSpace/admin/dashboard.php">ADMINISTRATION</a></h5>';
            }
        }
    }
});
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
});
