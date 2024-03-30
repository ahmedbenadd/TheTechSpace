<?php
    include('config.php');
    session_start();
    $response = array();
    if (isset($_SESSION["id"])) {
        if($connStatus === "success") {
            $query = "SELECT * FROM users WHERE id = '" . $_SESSION["id"] . "'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user'] = $row;
            $response = array (
                'login' => true,
                'full_name' => $row['full_name'],
                'email' => $row['email'],
                'username' => $row['username'],
                'is_admin' => $row['is_admin'],
                'shipping_adress' => $row['shipping_adress'],
                'is_active' => $row['is_active']
            );
            $conn->close();
        }
    }
    else {
        $response = array (
            'login' => false
        );
    }
    echo json_encode($response);
?>
