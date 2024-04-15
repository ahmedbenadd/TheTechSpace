<?php
    session_start();
    if($_SESSION['is_admin'] != 1 || !isset($_POST['user_id'])) {
        header('location: ../dashboard.php');
        exit();
    } else {
        include('../../php/config.php');
        $user_id = $_POST['user_id'];
        $delete_query = "DELETE FROM users WHERE id = $user_id";
        mysqli_query($conn,$delete_query);
    }
?>