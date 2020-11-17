<?php
include('database_connection.php');
session_start();
$doctor_id=$_SESSION['doctor_id'];
$day=$_POST['day'];
$start=$_POST['start'];
$start=$start+":00";
$end=$_POST['end'];
$end=$end+":00";
$id=$_SESSION['doctor_id'];
$insert_query="insert into slots (doctor_id,day_of_slot,start_time,end_time) values ($id,'$day','$start','$end')";
$insert_query_result=mysqli_query($conn,$insert_query) or die(mysqli_error($conn));
header('location:doctorprofile.php');
?>

