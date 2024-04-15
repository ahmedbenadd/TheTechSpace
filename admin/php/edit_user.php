<?php
session_start();
include('../../php/config.php');
$response = array();
$is_admin_query = "SELECT is_admin FROM users WHERE id = ".$_SESSION['id'];
$_SESSION['is_admin'] = mysqli_fetch_assoc(mysqli_query($conn, $is_admin_query))['is_admin'];
if ($_SESSION['is_admin'] != 1 || !isset($_POST['userId'])) {
    $response['statue'] = false;
    $response['message'] = "Unauthorized_access";
} else {
    $user_id = $_POST['userId'];
    $full_name = $_POST['fullName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $admin = $_POST['admin'];
    $password = $_POST['password'];

    $email_check_query = "SELECT id FROM users WHERE email = '$email' AND id != $user_id";
    $email_check_result = mysqli_query($conn, $email_check_query);
    if (mysqli_num_rows($email_check_result) > 0) {
        $response['statue'] = false;
        $response['message'] = "Used_Email";
    } else {
        $username_check_query = "SELECT id FROM users WHERE username = '$username' AND id != $user_id";
        $username_check_result = mysqli_query($conn, $username_check_query);
        if (mysqli_num_rows($username_check_result) > 0) {
            $response['statue'] = false;
            $response['message'] = "Used_Username";
        } else {
            if (empty($password)) {
                $update_query = "UPDATE users SET full_name = '$full_name', username = '$username', email = '$email', is_admin = '$admin' WHERE id = $user_id";
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $update_query = "UPDATE users SET full_name = '$full_name', username = '$username', email = '$email', password = '$password', is_admin = '$admin' WHERE id = $user_id";
            }
            if (mysqli_query($conn, $update_query)) {
                $response['statue'] = true;
                $response['message'] = "uptated";
            }
        }
    }
}
$_SESSION['is_admin'] = $admin;
echo json_encode($response);
?>
