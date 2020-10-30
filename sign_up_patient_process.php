<?php

include('database_connection.php');
$username = $_POST['username'];
$username=mysqli_real_escape_string($conn,$username);//my_sqli_function here is being used to remove the

$first_name = $_POST['first_name'];                 //extra ' symbols
$first_name=mysqli_real_escape_string($conn,$first_name);

$last_name = $_POST['last_name'];
$last_name=mysqli_real_escape_string($conn,$last_name);

$city = $_POST['city'];
$city=mysqli_real_escape_string($conn,$city);


$email_id = $_POST['email_id'];
$email_id=mysqli_real_escape_string($conn,$email_id);

$password = $_POST['password'];
$password=mysqli_real_escape_string($conn,$password);


$insert_query="INSERT INTO patients(username,first_name,last_name,patient_city,patient_email,patient_password) values"
        . "('$username','$first_name','$last_name','$city','$email_id','$password')";

$insert_query_result=mysqli_query($conn,$insert_query)or die(mysqli_error($conn));

?>