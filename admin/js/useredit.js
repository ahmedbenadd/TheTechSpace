document.querySelector('#delete-btn').addEventListener('click', function (){
    const userId = this.getAttribute('data-userid');
    darkOverlay = document.querySelector('.dark-overlay');
    modal = document.querySelector('#myModal');
    closeBtn = document.querySelector('.close');
    cancelBtn = document.querySelector('#cancel');
    deleteBtn = document.querySelector("#delete");
    darkOverlay.style.display = "block";
    modal.style.display = "block";
    darkOverlay.addEventListener('click', function (){
        darkOverlay.style.display = "none";
        modal.style.display = "none";
    });
    closeBtn.addEventListener('click', function (){
        darkOverlay.style.display = "none";
        modal.style.display = "none";
    });
    cancelBtn.addEventListener('click', function (){
        darkOverlay.style.display = "none";
        modal.style.display = "none";
    });
    deleteBtn.addEventListener('click', function () {
        $.ajax({
            url: 'php/delete_user.php',
            type: 'POST',
            data: { user_id: userId },
            error: function(error) {
                console.error('Error:', error);
            },
            complete: function () {
                cancelBtn.click();
                window.location.reload();
            }
        });
    });
});

document.getElementById('editPasswordCheckbox').addEventListener('change', function() {
    var passwordInputContainer = document.getElementById('passwordInputContainer');
    if (this.checked) {
        passwordInputContainer.style.display = 'block';
    } else {
        passwordInputContainer.style.display = 'none';
        document.getElementById('password').value = "";
        document.getElementById('password-error').textContent = "";
    }
});

document.querySelector('#submit-btn').addEventListener('click', function (){
    const userId = this.getAttribute('data-userid');
    let fullName = document.getElementById('fullname').value;
    let username = document.getElementById('username').value;
    let email = document.getElementById('email').value;
    let password = "";
    let admin = 0;

    let fullNameError = document.getElementById("full-name-error");
    let usernameError = document.getElementById("username-error");
    let emailError = document.getElementById("email-error");
    let passwordError = document.getElementById("password-error");

    if(document.querySelector('#editPasswordCheckbox').checked) {
        password = document.getElementById('password').value;
    }
    if(document.querySelector('#admin').checked) {
        admin = 1;
    }

    fullNameError.textContent = "";
    usernameError.textContent = "";
    emailError.textContent = "";
    passwordError.textContent = "";

    let isValid = true;

    if (fullName.trim() === "") {
        fullNameError.textContent = "*Please enter your full name.";
        document.getElementById("fullname").style.marginBottom = "4px";
        isValid = false;
    }

    if (username.trim() === "") {
        usernameError.textContent = "*Please enter an username.";
        document.getElementById("username").style.marginBottom = "4px";
        isValid = false;
    }

    if (!isValidEmail(email)) {
        emailError.textContent = "*Please enter a valid email address.";
        document.getElementById("email").style.marginBottom = "4px";
        isValid = false;
    }

    if (document.querySelector('#editPasswordCheckbox').checked) {
        if (password.length < 8) {
            passwordError.textContent = "*Password must be at least 8 characters long.";
            document.getElementById("password").style.marginBottom = "4px";
            isValid = false;
        } else if (!/\d/.test(password)) {
            passwordError.textContent = "*Password must contain at least one numeric character.";
            document.getElementById("password").style.marginBottom = "4px";
            isValid = false;
        }
    }

    if (isValid) {
        $.ajax({
            url: 'php/edit_user.php',
            type: 'POST',
            data: {userId: userId, fullName: fullName, username: username, email: email, password: password, admin: admin },
            error: function(error) {
                console.error('Error:', error);
            },
            success: function (data) {
                var response = JSON.parse(data);
                if(response.statue) {
                    window.location.reload();
                } else {
                    if(response.message == "Used_Email") {
                        emailError.textContent = "Email already in use!";
                    } else if (response.message == "Used_Username") {
                        usernameError.textContent = "Username already in use!";
                    } else {
                        window.location.reload();
                    }
                }
            }
        });
    }
});

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

