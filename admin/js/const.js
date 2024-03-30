/*--------------- MENU TRANSITION ---------------*/
/*_______________________________________________*/
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

/*--------------- GETTING USER DATA ---------------*/
/*_________________________________________________*/

let userData = JSON.parse(localStorage.getItem('userData'));

// if(userData['is_admin'] == 1) {
//     document.querySelector('.user_fname').innerHTML = userData['full_name'];
// } else {
//     window.location.href = "/TheTechSpace/index.php";
// }
