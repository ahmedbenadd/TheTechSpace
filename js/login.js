document.addEventListener('DOMContentLoaded', function() {

/*--------------- TRANSITION OF FORM BLOCK ---------------*/
/*________________________________________________________*/


let signUpButton = document.getElementById('signUp');
let signInButton = document.getElementById('signIn');
let container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});

/*--------------- SIGNUP FORM BLOCK ---------------*/
/*_________________________________________________*/


let signupSubmit = document.getElementById('signup-submit');

function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validateSignup() {
    let fullName = document.getElementById('full_name').value;
    let username = document.getElementById('username').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let comPassword = document.getElementById('c_password').value;

    let fullNameError = document.getElementById("full-name-error");
    let usernameError = document.getElementById("username-error");
    let emailError = document.getElementById("email-error");
    let passwordError = document.getElementById("password-error");
    let comPasswordError = document.getElementById("confirm-password-error");

    fullNameError.textContent = "";
    usernameError.textContent = "";
    emailError.textContent = "";
    passwordError.textContent = "";
    comPasswordError.textContent = "";

    let isValid = true;

    if (fullName.trim() === "") {
        fullNameError.textContent = "*Please enter your full name.";
        document.getElementById("full_name").style.marginBottom = "4px"
        isValid = false;
    }

    if (username.trim() === "") {
        usernameError.textContent = "*Please enter an username.";
        document.getElementById("username").style.marginBottom = "4px"
        isValid = false;
    }

    if (!isValidEmail(email)) {
        emailError.textContent = "*Please enter a valid email address.";
        document.getElementById("email").style.marginBottom = "4px"
        isValid = false;
    }

    if (password.length < 8) {
        passwordError.textContent = "*Password must be at least 8 characters long.";
        document.getElementById("password").style.marginBottom = "4px"
        isValid = false;
        document.getElementById('password').value = "";
        document.getElementById('c_password').value = "";  
    } else if (!/\d/.test(password)) {
        passwordError.textContent = "*Password must contain at least one numeric character.";
        document.getElementById("password").style.marginBottom = "4px"
        isValid = false;
        document.getElementById('password').value = "";
        document.getElementById('c_password').value = "";
    }

    if(password !== comPassword) {
        document.getElementById('c_password').style.marginBottom = '8px';
        comPasswordError.textContent = "*Passwords do not match.";
        document.getElementById("c_password").style.marginBottom = "4px";
        document.getElementById("signup-submit").style.marginTop = "6px";
        document.getElementById('password').value = "";
        document.getElementById('c_password').value = "";
        isValid = false;
    }
    return isValid;
};

function submitSignUp(event) {
    event.preventDefault();
    if (validateSignup()) {

        let fullName = document.getElementById('full_name').value;
        let username = document.getElementById('username').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        $.ajax({
            method: 'POST',
            url: 'php/signup_process.php',
            data: {fullName: fullName, username: username, email: email, password: password },
            beforeSend : function() {
                document.querySelector('#signup-submit').innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="25px" height="15px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#ffffff" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>';
            },
            success : function (data, status, xhr) {
                var responseData = JSON.parse(data);
                if(responseData === "signup_success") {
                    console.log(data);
                    document.getElementById('full_name').value = "";
                    document.getElementById('username').value = "";
                    document.getElementById('email').value = "";
                    document.getElementById('password').value = "";
                    document.getElementById('c_password').value = "";
                    document.getElementById('email-s').value = email;
                    document.getElementById('password-s').value = "";
                    signInButton.click();
                    document.getElementById('s_popup').classList.add("active-popup");
                    document.querySelector('#signup-submit').innerHTML = 'Sign Up';
                }
                else if(responseData === "email_used") {
                    console.log(data);
                    document.getElementById('password').value = "";
                    document.getElementById('c_password').value = "";
                    document.getElementById('email-s').value = email;
                    document.getElementById('password-s').value = "";
                    document.getElementById('e_popup').classList.add("active-popup");
                    document.querySelector('#signup-submit').innerHTML = 'Sign Up';
                }
                else {
                    console.log(data);
                    document.getElementById('password').value = "";
                    document.getElementById('c_password').value = "";
                    document.getElementById('email-s').value = email;
                    document.getElementById('password-s').value = "";
                    $(".para").text("An error occurred. Please try again.");
                    document.getElementById('e_popup').classList.add("active-popup");
                    document.querySelector('#signup-submit').innerHTML = 'Sign Up';
                }
                    
            },
            complete : function() {
                document.querySelector('#signup-submit').innerHTML = 'Sign Up';
            }
     
        });
    }
}

signupSubmit.addEventListener('click', submitSignUp);

/*--------------- SIGNIN FORM BLOCK ---------------*/
/*_________________________________________________*/

let signinSubmit = document.getElementById('signin-submit');
signinSubmit.addEventListener('click', function (event) {
    event.preventDefault();

    let emailS = document.getElementById('email-s').value;
    let passwordS = document.getElementById('password-s').value;
    let emailErrorS = document.getElementById("email-error-s");
    let passwordErrorS = document.getElementById("password-error-s");

    let isValid = true;

    if(emailS.trim() === "") {
        document.getElementById('password-s').value = "";
        emailErrorS.textContent = "*Please enter a valid username.";
        isValid = false;
    }

    if(passwordS.trim() === "") {
        passwordErrorS.textContent = "*Please enter your password.";
        document.getElementById('password-s').value = "";
        isValid = false;
    }
    if(isValid) {
        $.ajax({
            method: 'POST',
            url: 'php/signin_process.php',
            data: {email: emailS, password: passwordS },
            beforeSend : function() {
                document.querySelector('#signin-submit').innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="25px" height="15px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#ffffff" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>';
            },
            success : function (data, status, xhr) {
                var responseData = JSON.parse(data);
                console.log(responseData)
                if(responseData.status === "signin_success") {
                    document.getElementById('email-s').value = emailS;
                    document.getElementById('password-s').value = "";
                    window.location.reload();
                    window.location.href = "index.php";
                }
                else if(responseData.status === "signin_error") {
                    console.log(responseData.message);
                    document.getElementById('email-s').value = emailS;
                    document.getElementById('password-s').value = "";
                    passwordErrorS.textContent = "*Incorrect email or password.";
                }
                else if(responseData.status === "database_error") {
                    console.log(responseData.status);
                    document.getElementById('password-s').value = "";
                    $(".para").text("An error occurred. Please try again.");
                    document.getElementById('e_popup').classList.add("active-popup");
                }         
            },
            error : function (xhr, status, error) {
                console.log("Error occurred:", error);

            },
            complete : function() {
                document.querySelector('#signin-submit').innerHTML = 'Sign In';
            }
        });
    }   
}
);
/*--------------- POPUP BLOCK ---------------*/
/*___________________________________________*/

let sPopUp = document.getElementById("s_button").addEventListener('click', function (event) {
    event.preventDefault();
    document.getElementById('s_popup').classList.remove("active-popup");
});

let ePopUp = document.getElementById("e_button").addEventListener('click', function (event) {
    event.preventDefault();
    document.getElementById('e_popup').classList.remove("active-popup");
});
});
