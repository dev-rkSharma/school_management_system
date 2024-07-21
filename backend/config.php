<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "school_mnagement_system";

    $conn = mysqli_connect($server, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }
?>