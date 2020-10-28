<?php

include('database_connection.php');
$username = $_POST['username'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$city = $_POST['city'];
$doctor_type = $_POST['doctor_type'];
$email_id = $_POST['email_id'];
$password = $_POST['password'];
$insert_query="INSERT INTO doctors (doctor_username,doctor_type,first_name,last_name,doctor_city,doctor_email,doctor_password) values"
        . "('$username','$doctor_type','$first_name','$last_name','$city','$email_id','$password')";
$insert_query_result=mysqli_query($conn,$insert_query)or die(mysqli_error($conn));

?>