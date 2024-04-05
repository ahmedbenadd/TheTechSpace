<?php   
    include('config.php');
    if($connStatus === 'error') {
        $response = 'database_error';
    }
    else {
        if (isset($_POST)) {
            $username = $_POST["username"];
            $cur_pass = $_POST["curPass"];
            $new_pass = $_POST["newPass"];
    
            $query = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);

            if (password_verify($cur_pass, $row['password'])) {
                $new_pass_hash = password_hash($new_pass, PASSWORD_DEFAULT);
                $updateQuery = "UPDATE users SET password = '$new_pass_hash' WHERE username = '$username'";
                if (mysqli_query($conn, $updateQuery)) {
                    $response = 'password_updated';
                } else {
                    $response = 'password_update_failed';
                }
            } else {
                $response = "cur_pass_incorrect";
            }
            $json_response = array('status' => $response);
            echo json_encode($json_response);
        }
        $conn->close();
    }
?>