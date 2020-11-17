<!DOCTYPE html>
<?php
    //database connection inclusion
    include("database_connection.php");
    function showAppointments($doctor_id, $current_date, $day_number) {
        $date_and_day = strtotime($current_date);
        if($day_number == 1) {
            $date_and_day = strtotime($current_date . "+$day_number day");
        } else if($day_number > 1) {
            $date_and_day = strtotime($current_date . "+$day_number days");
        }

        $day = date("l", $date_and_day);
        $date = date("Y-m-d", $date_and_day);

        $sql = "SELECT * FROM slots where doctor_id = $doctor_id && day_of_slot = '$day'";

        if (isset($conn)) {
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                    $start_time = $row["start_time"];
                    $end_time = $row["end_time"];

                    $sql = "SELECT * FROM appointments where doctor_id = {$doctor_id}"
                        . "AND date_of_appointment = $date AND start_time = $start_time AND end_time = $end_time";

                    if (isset($conn)) {
                        $available_slots = mysqli_query($conn, $sql);
                        if ($available_slots) {
                            //slot is book so it won't be displayed
                            continue;
                        } else {
                            //slot is available for this slot press the button below to book it
                            echo $date . $day . $start_time . $end_time . "is free.<br/>";
                            echo "<form action='book_appointments.php' method='POST'>";
                            echo "<input type='hidden' name='doctor_id' value = $doctor_id/>";
                            echo "<input type='hidden' name='date_of_appointment' value = $date/>";
                            echo "<input type='hidden' name='start_time' value=$start_time/>";
                            echo "<input type='hidden' name='end_time' value=$end_time/>";
                            echo "<input type='submit' name='book this slot' value='book this slot'/>";
                            echo "</form>";
                        }
                    }

                }
            } else {
                echo "No slots on this $day $date";
            }
        }
    }
?>
<html>
    <head>
        <title>Doctor's appointment system</title>
    </head>

    <body>
        <?php
            //fetching the doctor_id from url
            $doctor_id = $_GET["doctor_id"];

            //showing all the available slots of this doctor for this week
            $current_date = date('Y-m-d');
            for($day_number = 0;$day_number < 7;$day_number++) {
                showAppointments($doctor_id, $current_date, $day_number);
            }
        ?>
    </body>
</html>
