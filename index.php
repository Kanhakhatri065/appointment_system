<!DOCTYPE html>
<?php
    include("database_connection.php");
    function showDoctorsTable($result) {
        echo "<table><tr><th>First Name</th><th>Last Name</th><th>Specialization</th><th>City</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row["first_name"] . "</td>";
            echo "<td>" . $row["last_name"] . "</td>";
            echo "<td>" . $row["doctor_type"] . "</td>";
            echo "<td>" . $row["doctor_city"] . "</td>";
            echo "<td>" . "<a href='show_appointments.php?doctor_id=" . $row["doctor_id"] . "'>Show slots of this doctor</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>
<html lang="en">
    <head>
        <title>Doctor's appointment system</title>
    </head>

    <body>
        <div class="topnav">
            <a class="active" href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
            <form action="" method="GET">
                <label>
                    <input type="text" name="search_query" placeholder="Search..." />
                </label>
                <label>
                    <input type="radio" name="search_type" value="By city" />
                </label>
                <label>By city</label>
                <label>
                    <input type="radio" name="search_type" value="By specialization" />
                </label>
                <label>By specialization</label>
                <label>
                    <input type="radio" name="search_type" value="By name" />
                </label>
                <label>By name</label>
                <input type="submit" value="Submit" name="search_button" />
            </form>
        </div> 

        <?php
            if(isset($_GET["search_button"])) {
                $search_query = $_GET["search_query"];
                $search_type = $_GET["search_type"];
    
                $types_of_searches = array("By city", "By specialization", "By name");
    
                $sql = "";
                if($search_type == $types_of_searches[0]) {
                    $sql = sprintf("SELECT * FROM doctors WHERE doctor_city = '%s'", $search_query);
                } else if($search_type == $types_of_searches[1]) {
                    $sql = sprintf("SELECT * FROM doctors WHERE doctor_type = '%s'", $search_query);
                } else {
                    $sql = "SELECT * FROM doctors WHERE first_name LIKE '%". $search_query . "%' AND last_name '%" . $search_query . "%'";
                }
    
                if(isset($conn)) {
                    $result = mysqli_query($conn, $sql);
                    if($result) {
                        showDoctorsTable($result);
                    } else {
                        echo "No such doctors found";
                    }
                }
            } else {
                $sql = "SELECT * FROM doctors";

                if(isset($conn)) {
                    $result = mysqli_query($conn, $sql);
                    if($result) {
                        showDoctorsTable($result);
                    } else {
                        echo "No such doctors found";
                    }
                }
            }
        ?>


    </body>
</html>