<?php

include('database_connection.php');
$username = $_POST['username'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$city = $_POST['city'];
$doctor_type = $_POST['doctor_type'];
$email_id = $_POST['email_id'];
$password = $_POST['password'];

$sql = "SELECT * FROM doctors WHERE doctor_email = '$email_id'";
