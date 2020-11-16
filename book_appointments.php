<?php
    //database connection inclusion
    include("database_connection.php");

    //fetching required data to create an appointment
    $patient_id = $_SESSION["patient_id"];
    $doctor_id = $_POST["doctor_id"];
    $date = $_POST["date"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];

    //create sql query to push data in the table
    $sql = "INSERT INTO appointments(patient_id, doctor_id, date_of_appointment, start_time, end_time)"
    ." values ($patient_id, $doctor_id, $date, $start_time, $end_time)";

    //firing the above mentioned sql query
    if(isset($conn)) {
        if(mysqli_query($conn, $sql)) {
            echo "Appointment booked successfuly";
        } else {
            echo "Error while booking appointment";
        }
    }

    echo "<a href='index.php'>Head to Main Page</a>";
?>
