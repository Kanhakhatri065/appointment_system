<?php
session_start();
include('database_connection.php');
$username = $_POST['username'];
$username=mysqli_real_escape_string($conn,$username);//my_sqli_function here is being used to remove the

$first_name = $_POST['first_name'];                 //extra ' symbols
$first_name=mysqli_real_escape_string($conn,$first_name);

$last_name = $_POST['last_name'];
$last_name=mysqli_real_escape_string($conn,$last_name);

$city = $_POST['city'];
$city=mysqli_real_escape_string($conn,$city);

$doctor_type = $_POST['doctor_type'];
$doctor_type=mysqli_real_escape_string($conn,$doctor_type);

$email_id = $_POST['email_id'];
$email_id=mysqli_real_escape_string($conn,$email_id);

$password = $_POST['password'];
$password=mysqli_real_escape_string($conn,$password);


$insert_query="INSERT INTO doctors (doctor_username,doctor_type,first_name,last_name,doctor_city,doctor_email,doctor_password) values"
        . "('$username','$doctor_type','$first_name','$last_name','$city','$email_id','$password')";

$insert_query_result=mysqli_query($conn,$insert_query)or die(mysqli_error($conn));
$select_query="select * from doctors where doctor_email='$email_id'";
$select_query_result= mysqli_query($conn,$select_query);
$row=mysqli_fetch_row($select_query_result);


$_SESSION['doctor_id']=$row['doctor_id'];
echo $row['doctor_id'];
header('location:doctorprofile.php');
?>