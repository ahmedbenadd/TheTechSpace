document.getElementById('menu-toggle').addEventListener('click', function() {
  console.log('menu clicked');
  var navbar = document.getElementById('navbar');
  var header = document.getElementById('header');
  var toggle = document.getElementById('menu-toggle');
  var container = document.getElementById('menu-toggle-container');
  navbar.classList.toggle('active');
  header.classList.toggle('active');
  toggle.classList.toggle('active');
  container.classList.toggle('active');
});

document.getElementById('products').addEventListener('click', function() {
  var chevron = document.getElementById('cheveron');
  var categoriesList = document.querySelector('.ul2');
  chevron.classList.toggle('cheveron-active');
  categoriesList.classList.toggle('ul2-show');
});

let userData = {};

function checkLogin(callback) {
    $.ajax({
        url: "php/user_data.php",
        type: "POST",
        success: function(data){ 
            var responseData = JSON.parse(data);
            if (responseData.login) {
                userData = responseData;
                callback(true);
            } else {
                callback(false);
            }
        },
        error: function(xhr, status, error){
            console.log('ERROR IN PHP USER DATA');
            callback(false);
        }
    });
}

checkLogin(function(isLoggedIn) {
    if (isLoggedIn) {
        console.log('logged');
        document.querySelector('.acc').innerHTML = `<a href="#"><img src="icons/user-solid.svg" class="icons-top-header">&nbsp;&nbsp;${userData['full_name']}</a>`;
        document.querySelector('.user-a').setAttribute('href', '#');
        document.querySelector('.down-li').innerHTML = '<li><a href="php/logout.php">LOG OUT</a></li>';

    }
    if (isLoggedIn && userData['is_admin'] == 1) {
        document.querySelector('.down-li').innerHTML = '<li><a href="php/logout.php">LOG OUT</a></li><li><a href="#">ADMINISTRATION</a></li>';
    }
});
