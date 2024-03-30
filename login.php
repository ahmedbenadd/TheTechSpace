<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
    <link rel="icon" type="icon/png" href="logos/logo-nobg.png">
    <title>Login</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
			<form action="" method="" id="signup-form">
                <h1 class="h1-form">Create Account</h1>
                <input type="text" id="full_name" placeholder="Full Name" required />
                <span id="full-name-error" class="error-message"></span>
				<input type="text" id="username" placeholder="Username" required />
                <span id="username-error" class="error-message"></span>
				<input type="email" id="email" placeholder="Email" required />
                <span id="email-error" class="error-message"></span>
                <input type="password" id="password" placeholder="Password" required />
                <span id="password-error" class="error-message"></span>
                <input type="password" id="c_password" placeholder="Confirm Password" class="last-input" required />
                <span id="confirm-password-error" class="error-message"></span>
                <button class="button-form" name="signup" id="signup-submit" type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="" method="" id="signin-form">
                <h1 class="h1-form">Sign in</h1>
                <input type="text" id="email-s" placeholder="Email or Username" required />
                <span id="email-error-s" class="error-message"></span>
                <input type="password" id="password-s" placeholder="Password" class="last-input2" required />
                <span id="password-error-s" class="error-message"></span>
                <a href="#" class="forgot-password">Forgot your password?</a>
                <button class="button-form" name="signin" id="signin-submit" type="button">
                    Sign In
                </button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img src="logos/logo-white-nobg.png" alt="TheTechSpace">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <img src="logos/logo-white-nobg.png" alt="TheTechSpace">
                    <h1>Hello!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <div id="s_popup" class="popup" >
        <div class="popup-content">
            <div class="imgbox">
                <img src="icons/checked.png" alt="" class="img">
            </div>
            <div class="title">
                <h3>Success!</h3>
            </div>
            <p class="para">
                Your account has been registred.<br>Try signing in.
			</p>
            <a href="" class="button" id="s_button">Sign In</a>
        </div>
    </div>
    <div id="e_popup" class="popup">
        <div class="popup-content">
            <div class="imgbox">
                <img src="icons/cancel.png" alt="" class="img">
            </div>
            <div class="title">
                <h3>Sorry :(</h3>
            </div>
            <p class="para">
                Email already in use.<br>Try with a new one.
            </p>
            <button class="button" id="e_button">Try Again</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="js/login.js"></script>
</body>
</html>
