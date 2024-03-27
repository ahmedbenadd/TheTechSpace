function checkLogin(userData) {
    if (userData && userData.login) {
        return true;
    } else {
        return false;
    }
}

// Function to fetch and store user data
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
                    document.querySelector('.acc').innerHTML = `<a href="#"><img src="icons/user-solid.svg" class="icons-top-header">&nbsp;&nbsp;${userData['full_name']}</a>`;
                    document.querySelector('.user-a').setAttribute('href', '#');
                    document.querySelector('.down-li').innerHTML = '<li><a href="#" class="logout-button">LOG OUT</a></li>';      
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

// Call the function to fetch and store user data
fetchAndStoreUserData();


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

let burgerShow = document.querySelector(".burger-show");

burgerShow.onclick = function () {
    document.querySelector(".burger-menu").classList.add("burger-menu-showed");
}

let burgerHide = document.querySelector(".burger-header");

burgerHide.onclick = function () {
    document.querySelector(".burger-menu").classList.remove("burger-menu-showed");
}

let burgerCat = document.querySelector(".catg-button");

burgerCat.addEventListener("click" , function () {
    console.log('clicked');
    let catg = document.querySelector(".catg");
    let cheveron = document.querySelector("#cheveron");
    catg.classList.toggle("catg-showed");
    cheveron.classList.toggle("cheveron-rotated");
}); 

