<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="icon/png" href="logos/logo-nobg.png">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="hedr1">
            <a href="/TheTechSpace/index/index.php"><img src="logos/logo-white-nobg.png" alt="The TechSpace"></a>
        </div>
        <div class="hedr2">
            <h1>The TechSpace</h1>
        </div>
        <form action="login.php" method="post" autocomplete="off">
            <h2>Sign in</h2>
            <?php 
                if (isset($_GET['error'])) {
                    $error = $_GET['error'];
                    if ($error === 'ConnectingError') {
                        echo '<p style="color: red;margin:0;font-size: 12.4px;">Connecting error. Please try again.</p>';
                    }
                }
            ?>
            <input type="text" id="user" name="user" placeholder="Email or Username" required>
            <?php 
                if (isset($_GET['error'])) {
                    $error = $_GET['error'];
                    if ($error === 'IncorrectUsername') {
                        echo '<p style="color: red;margin:0;font-size: 12.4px;">Incorrect username. Please try again.</p>';
                    }
                }
            ?>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <?php 
                if (isset($_GET['error'])) {
                    $error = $_GET['error'];
                    if ($error === 'IncorrectPassword') {
                        echo '<p style="color: red;margin:0;font-size: 12.4px;">Incorrect password. Please try again.</p>';
                    }
                }
            ?>
            <input type="submit" name="submit" value="LOGIN" >
        </form>
    </div>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        include('php/config.php');
        session_start();
        $conn = mysqli_connect("localhost","root","","thetechspace_db");
        if(mysqli_connect_errno()) {
            header("location:login.php?error=ConnectingError");
            exit();        
        }
        $user = $_POST['user'];
        $password = $_POST['password'];
        $query = "SELECT * FROM users WHERE Username = '$user' OR Email = '$user'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) == 1) {
            if($password == $row['Password']) {
                $_SESSION['id_administration'] = $row['Id'];
                header("location:dashboard.php");
                exit();
            }
            else {
                header("location:login.php?error=IncorrectPassword");
                exit();
            }
        } 
        else {
            header("location:login.php?error=IncorrectUsername");
            exit();
        }   
    }
?>