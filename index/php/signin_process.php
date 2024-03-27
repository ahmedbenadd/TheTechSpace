<?php   
    include('config.php');
    if($connStatus === 'error') {
        $response = array(
            'status' => 'database_error'
        );
    }
    else {
        if (isset($_POST)) {
            $email = $_POST["email"];
            $username = $_POST["email"];
            $password = $_POST["password"];
    
            $query = "SELECT * FROM users WHERE email = '$email' or username = '$username'";
            $result = mysqli_query($conn, $query);
    
            if (mysqli_num_rows($result) == 1) {
    
                $row = mysqli_fetch_assoc($result);
    
                if (password_verify($password, $row['password'])) {
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $response = array(
                        'status' => 'signin_success',
                        'message' => 'Login successful',
                    );
                } else {
                    $response = array(
                        'status' => 'signin_error',
                        'message' => 'Login went wrong',
                    );
                }
            } else {
                echo "wrog user";
                $response = array(
                    'status' => 'signin_error',
                    'message' => 'Login went wrong',
                );
            }
        }
        $conn->close();

    }
    echo json_encode($response);
?>