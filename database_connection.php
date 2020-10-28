<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
   $conn = mysqli_connect("$servername", "$username", "", "appointment_system")or die($mysqli_error($con))
   //database name has been set to appointment_system and the access method has been changed
   //it was 
   // $conn =  new mysqli($servername, $username, $password);

   // if($conn->connect_error) {
    //    die("Connection failed : " . $conn->connect_error);
    //}
?>