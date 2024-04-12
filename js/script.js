document.addEventListener("DOMContentLoaded", function() {
// __________ SCROLL TO UP BTN __________//

let toUp = document.querySelector(".to-up");
window.onscroll = function() {
    if (window.scrollY >= 400) {
        toUp.classList.add("to-up-show");
    } else {
        toUp.classList.remove("to-up-show");
    }
};

toUp.onclick = function() {
    console.log('clicked');
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
};

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

function accData () {

    document.querySelector('.acc').innerHTML = `<a style="cursor: default;"><img src="icons/user-solid.svg" class="icons-top-header">&nbsp;&nbsp;${userData.full_name}</a>`;
    document.querySelector('.user-a').setAttribute('href', '#');
    document.querySelector('.down-li').innerHTML = '<li><a class="logout-button" onclick="logout();">LOG OUT</a></li>';
    document.querySelector('.first-name').innerHTML = `Hi, ${userData.full_name.split(" ")[0]}`;
    document.querySelector('#acc_full_name').value = userData.full_name;
    document.querySelector('#acc_email').value = userData.email;
    document.querySelector('#acc_username').value = userData.username;
    document.querySelector("#savePass").addEventListener('click', function(event) {event.preventDefault(); updateAccPass();});
};

function accDataAdmin () {
    document.querySelector('.additional-options').innerHTML += '<a id="administratorButton" href="/TheTechSpace/admin/dashboard.php">Administration</a>';
    document.querySelector('.down-li').innerHTML = '<li><a href="admin/dashboard.php">ADMINISTRATION</a></li><li><a href="#" onclick="logout();" class="logout-button">LOG OUT</a></li>';
    document.querySelector('.footer-admin').innerHTML = '<h5><a href="/TheTechSpace/admin/dashboard.php">ADMINISTRATION</a></h5>';
};
function updateAccPass () {
    let curPass = document.querySelector("#acc_current_password").value;
    let newPass = document.querySelector("#acc_new_password").value;
    let comPass = document.querySelector("#acc_confirm_password").value;
    let isValid = true;

    if (curPass.trim() === "") {
        document.querySelector('.curr-pass-err').textContent = "*Please a valid password.";
        isValid = false;
    }

    if (newPass.trim() === "") {
        document.querySelector('.new-pass-err').textContent = "*Please a valid password.";
        isValid = false;
    }

    if (comPass.trim() === "") {
        document.querySelector('.comf-pass-err').textContent = "*Please a  valid password.";
        isValid = false;
    }

    if(isValid) {
        if (newPass.length < 8) {
            document.querySelector('.new-pass-err').textContent = "*Password must be at least 8 characters long.";
            isValid = false;
        } else if (!/\d/.test(newPass)) {
            document.querySelector('.new-pass-err').textContent = "*Password must contain at least one numeric character.";
            isValid = false;
        }
        if(newPass !== comPass) {
            document.querySelector('.comf-pass-err').textContent = "*Passwords do not match.";
            isValid = false;
        }
    }
    
    if(isValid) {
        $.ajax({
            method: 'POST',
            url: 'php/update_password.php',
            data: {curPass: curPass, newPass: newPass, username: userData.username},
            dataType: 'json',
            beforeSend: function() {
                document.querySelector('#savePass').innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="25px" height="15px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#ffffff" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>';
            },
            success: function(response) {
                if (response.status === "password_updated") {
                    document.querySelector("#acc_current_password").value = "";
                    document.querySelector("#acc_new_password").value = "";
                    document.querySelector("#acc_confirm_password").value = "";
                    var successMessage = document.querySelector('.pass_success');
                    successMessage.classList.add('pass_success_showed');
                    setTimeout(function() {
                        successMessage.classList.remove('pass_success_showed');
                    }, 3000);
                } else if (response.status === "cur_pass_incorrect") {
                    document.querySelector("#acc_current_password").value = "";
                    document.querySelector("#acc_new_password").value = "";
                    document.querySelector("#acc_confirm_password").value = "";
                    document.querySelector('.curr-pass-err').textContent = "*Current password is wrong.";
                    setTimeout(function() {
                        document.querySelector('.curr-pass-err').textContent = '';
                    }, 5000);
                } else {
                    document.querySelector("#acc_current_password").value = "";
                    document.querySelector("#acc_new_password").value = "";
                    document.querySelector("#acc_confirm_password").value = "";
                    var successMessage = document.querySelector('.pass_success');
                    successMessage.textContent = "An error occured try again.";
                    successMessage.style.backgroundColor = "red";
                    successMessage.classList.add('pass_success_showed');
                    setTimeout(function() {
                        successMessage.classList.remove('pass_success_showed');
                    }, 3000);
                }
            },
            complete: function() {
                document.querySelector('#savePass').innerHTML = 'SAVE';
            }
        });
        
    }
}

// __________ CART MENU __________//

let cartShow = document.querySelector('.cart-show');
let cartMenu = document.querySelector('.cart-menu');

cartShow.onclick = function () {
    cartMenu.classList.add('cart-menu-showed');
    darkOverlay.style.display = "block";
}

function updateCartUI(cartData) {
    if (cartData.message == 'empty_cart') {
        document.querySelector('.cart-items-container').innerHTML = cartData.cart;
        const cartSummary = document.querySelector('.cart-summary');
        if (cartSummary) {
            cartSummary.remove();
        }
    } else {
        document.querySelector('.cart-items-container').innerHTML = cartData.cart;
        let cartSummary = document.querySelector('.cart-summary');
        if (!cartSummary) {
            cartSummary = document.createElement('div');
            cartSummary.classList.add('cart-summary');
            document.querySelector('.cart-menu').appendChild(cartSummary);
        }
        cartSummary.innerHTML = cartData['cart-summary'];
    }
    attachRemoveButtonListeners();
    attachSyncButtonListeners();
}

document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function() {
        const productId = this.getAttribute('data-productid');
        const currentButton = this;
        let quantityInput = document.querySelector('#cart-quantity');
        let quantity = quantityInput ? quantityInput.value : 1;
        let valid = true;

        if (quantity < 1 || quantity > 20) {
            document.querySelector('.quantity-error').innerHTML = "*Quantity must be between 1 and 20.";
            valid = false;
        }
        
        if (valid) {
            $.ajax({
                url: 'php/add_to_cart.php',
                type: 'POST',
                data: { productid: productId, item_quantity: quantity },
                beforeSend: function () {
                    currentButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="25px" height="15px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#d10024" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>';
                },
                success: function(data) {
                    const cartData = JSON.parse(data);
                    if (cartData.status) {
                        updateCartUI(cartData);
                    } else {
                        console.error('Error:', cartData.message);
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                },
                complete: function () {
                    cartShow.click();
                    currentButton.innerHTML = "ADD TO CART";
                    if(quantityInput) {
                        document.querySelector('.quantity-error').innerHTML = ""
                    }
                }
            });
        }
    });
});

function attachRemoveButtonListeners() {
    const removeButtons = document.querySelectorAll('.remove-item-button');
    if (removeButtons.length > 0) {
        removeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-productid');
                const currentButton = this;
                $.ajax({
                    url: 'php/remove_from_cart.php',
                    type: 'POST',
                    data: { productid: productId},
                    beforeSend: function () {
                        currentButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="13px" height="13px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fff" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>';
                    },
                    success: function(data) {
                        const cartData = JSON.parse(data);
                        if (cartData.status) {
                            updateCartUI(cartData);
                        } else {
                            console.error('Error:', cartData.message);
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    },
                    complete: function () {
                        cartShow.click();
                        currentButton.innerHTML = "&#x2715;";
                    }
                });
            });
        });
    }
}

function attachSyncButtonListeners() {
    const syncButtons = document.querySelectorAll('.sync-qty-button');
    if (syncButtons.length > 0) {
        syncButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-productid');
                const itemQuantityElement = document.querySelector('#qty-'+ productId);
                const itemQuantity = itemQuantityElement.value;
                let valid = true;
                const currentButton = this;
                if (itemQuantity > 20 || !itemQuantity) {
                    itemQuantityElement.classList.add('cart-item-quantity-err');
                    valid = false;
                }
                if (valid) {
                    $.ajax({
                        url: 'php/update_qty.php',
                        type: 'POST',
                        data: { productid: productId, item_quantity: itemQuantity },
                        beforeSend: function () {
                            currentButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="13px" height="13px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#fff" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>';
                        },
                        success: function(data) {
                            const cartData = JSON.parse(data);
                            if (cartData.status) {
                                updateCartUI(cartData);
                            } else {
                                console.error('Error:', cartData.message);
                            }
                        },
                        error: function(error) {
                            console.error('Error:', error);
                        },
                        complete: function () {
                            cartShow.click();
                            currentButton.innerHTML = "&#x2715;";
                        }
                    });
                }
            });
        });
    }
}


attachSyncButtonListeners();
attachRemoveButtonListeners();

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
            accData();
            if (userData['is_admin'] == 1) {
                accDataAdmin();
            }
        }
    }
});

});
