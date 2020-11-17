<?php
include("database_connection.php");
$email_id=$_POST['email_id'];
$password=$_POST['password'];
$select_query="select * from doctors where doctor_email='$email_id' and doctor_password='$password'";
$select_query_result=mysqli_query($conn,$select_query) or die(mysqli_error($conn));
if(mysqli_num_rows($select_query_result)==1){
    session_start();
    $row=mysqli_fetch_row($select_query_result);
    $_session['doctor_id']=$row['doctor_id'];
    $_session['doctor_email']=$row['doctor_email'];
    header('location:show_appointments.php');
    
}
else{
    header('location:logindoctor.php');
}
?>