<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "thetechspace_db";
    $conn;
    $connStatus = '';

    try {
        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
        $connStatus = 'success';
    } catch (Exception $e) {
        $connStatus = 'error';
    }

?>
