<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = mysqli_connect("$servername", "$username", "", "appointment_system");

    if(!$conn) {
        die("Could not connect" . mysqli_error($conn));
    }
?>