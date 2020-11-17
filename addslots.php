<?php
include('database_connection.php');
session_start();
$date=$_POST['date'];
$doctor_id=$_SESSION['doctor_id'];
$day=$_POST['day'];
$start=$_POST['start'];
$start=$date." ".$start;//the $start suppose contains="13:00:00 this has to beinserted int the insert query here it is a string but in database 
                       //it is of type h:m:s
$strtotime($start);
$end=$_POST['end'];
$end=$date." ".$end;

 
$id=$_SESSION['doctor_id'];
$insert_query="insert into slots (doctor_id,day_of_slot,start_time,end_time) values ($id,'$date',$start,$end)";
$insert_query_result=mysqli_query($conn,$insert_query) or die(mysqli_error($conn));
header('location:doctorprofile.php');
?>

