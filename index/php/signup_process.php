<?php   
    include('config.php');
    if($connStatus === 'error') {
        $response = array(
            'status' => 'database_error'
        );
    }
    else {
        if (isset($_POST)) {
            $full_name = $_POST['fullName'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            function email_or_username_not_used ($conn, $email, $username) {

                $query = "SELECT * FROM users WHERE Username = '$username'";
                $result = mysqli_query($conn, $query);
                return "username_used";

                $query = "SELECT * FROM users WHERE Email = '$email'";
                $result = mysqli_query($conn, $query);
                return "email_used";
                
                return true;
            }
            
            if (email_or_username_not_used($conn, $email, $username)) {
                $query = "INSERT INTO `users`( `full_name`, `username`, `email`, `password`) VALUES ('$full_name','$username','$email','$hashed_password')";
                if (mysqli_query($conn, $query)) {
                    $response = "signup_success";
                }
                else {
                    $response = "signup_error";
                }
            }
            else if (email_or_username_not_used($conn, $email, $username) === "username_used") {
                $response = "username_used";
            }
            else {
                $response = "email_used";
            }
        }
        $conn->close();
    }
    echo json_encode($response);
?>