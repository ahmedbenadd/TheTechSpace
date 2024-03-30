document.addEventListener('DOMContentLoaded', function() {
    let sendEmail = document.querySelector("#send_email");
    sendEmail.addEventListener("click", function () {
        let fullName = document.querySelector('#full_name').value;
        let email = document.querySelector('#email').value;
        let subject = document.querySelector('#subject').value;
        let message = document.querySelector('#message').value;

        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.querySelector(".er-email").innerHTML = "*Please enter a valid email.";
                return false;
            }
            return true;
        };

        function notEmpty(fullName,email, subject, message) {
            let valid = true;
            if (fullName.trim() === "") {
                document.querySelector(".er-name").innerHTML = "*Please enter your full name.";
                valid = false;
            } else {
                document.querySelector(".er-name").innerHTML = "";
            }
            if (email.trim() === "") {
                document.querySelector(".er-email").innerHTML = "*Please enter your email.";
                valid = false;
            } else {
                document.querySelector(".er-email").innerHTML = "";
            }
            if (subject.trim() === "") {
                document.querySelector(".er-subject").innerHTML = "*Please enter your subject.";
                valid = false;
            } else {
                document.querySelector(".er-subject").innerHTML = "";
            }
            if (message.trim() === "") {
                document.querySelector(".er-message").innerHTML = "*Please enter your message.";
                valid = false;
            } else {
                document.querySelector(".er-message").innerHTML = "";
            }
            return valid;
        };

        if (notEmpty(fullName, email, subject, message)) {
            if (isValidEmail(email)) {
                $.ajax({
                    method: 'POST',
                    url: 'php/send_email.php',
                    data: {fullName: fullName, email: email, subject: subject, message: message },
                    beforeSend : function() {
                        document.querySelector('#send_email').innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="25px" height="15px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#ffffff" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>';
                    },
                    success : function (data, status, xhr) {
                        var responseData = JSON.parse(data);
                        if(responseData === "email_sent") {
                            document.querySelector('.alert-content').innerHTML = `A confirmation email has been sent to: ${email}`;
                            document.querySelector('.alert-3-danger').classList.add("alert-fade");
                            setTimeout(function() {
                                document.querySelector('.alert-3-danger').classList.remove("alert-fade");
                            }, 4000); 
                            document.querySelector('#full_name').value = "";
                            document.querySelector('#email').value = "";
                            document.querySelector('#subject').value = "";
                            document.querySelector('#message').value = "";
                        }
                        else if(responseData === "invalid_email") {
                            document.querySelector('.alert-content').innerHTML = `The email provided do not exist`;
                            document.querySelector('.alert-title').innerHTML = 'Sorry :( ';
                            document.querySelector('.alert-3-danger').style.borderColor = '#ffb8b8';
                            document.querySelector('.alert-3-danger').style.backgroundColor = 'rgba(255, 56, 56, 0.05)';
                            document.querySelector('.alert-title').style.color = '#ff3838';
                            document.querySelector('.alert-3-danger').classList.add("alert-fade");
                            setTimeout(function() {
                                document.querySelector('.alert-3-danger').classList.remove("alert-fade");
                            }, 4000); 
                            document.querySelector('#full_name').value = fullName;
                            document.querySelector('#email').value = email;
                            document.querySelector('#subject').value = subject;
                            document.querySelector('#message').value = message;
                        }
                        else if(responseData === "sending_error") {
                            document.querySelector('.alert-content').innerHTML = `An error occurred while sending your email`;
                            document.querySelector('.alert-title').innerHTML = 'Sorry :( ';
                            document.querySelector('.alert-3-danger').style.borderColor = '#ffb8b8';
                            document.querySelector('.alert-3-danger').style.backgroundColor = 'rgba(255, 56, 56, 0.05)';
                            document.querySelector('.alert-title').style.color = '#ff3838';
                            document.querySelector('.alert-3-danger').classList.add("alert-fade");
                            setTimeout(function() {
                                document.querySelector('.alert-3-danger').classList.remove("alert-fade");
                            }, 4000); 
                            document.querySelector('#full_name').value = fullName;
                            document.querySelector('#email').value = email;
                            document.querySelector('#subject').value = subject;
                            document.querySelector('#message').value = message;
                        }       
                    },
                    error : function (xhr, status, error) {
                        document.querySelector('.alert-content').innerHTML = `An error occurred while sending your email`;
                        document.querySelector('.alert-title').innerHTML = 'Sorry :( ';
                        document.querySelector('.alert-3-danger').style.borderColor = '#ffb8b8';
                        document.querySelector('.alert-3-danger').style.backgroundColor = 'rgba(255, 56, 56, 0.05)';
                        document.querySelector('.alert-title').style.color = '#ff3838';
                        document.querySelector('.alert-3-danger').classList.add("alert-fade");
                        setTimeout(function() {
                            document.querySelector('.alert-3-danger').classList.remove("alert-fade");
                        }, 4000); 
                        document.querySelector('#full_name').value = fullName;
                        document.querySelector('#email').value = email;
                        document.querySelector('#subject').value = subject;
                        document.querySelector('#message').value = message;
                    },
                    complete : function() {
                        document.querySelector('#send_email').innerHTML = 'Send Message';
                    }
                });
            }
        }
        else {

        }
    });
    let userData = localStorage.getItem('userData');
    if (userData) {
        userData = JSON.parse(userData);
    }
    if (userData.login) {
        document.querySelector('#full_name').value = userData['full_name'];
        document.querySelector('#email').value = userData['email'];
    }
});

