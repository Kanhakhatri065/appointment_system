<!DOCTYPE html>
<?php
    include("database_connection.php");
?>
<html>
    <head>
        <title>Doctor's appointment system</title>
    </head>

    <body>
        <div class="topnav">
            <a class="active" href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
            <form action="" method="GET">
                <input type="text" name="search_query" placeholder="Search..." />
                <input type="radio" name="search_type" value="By city" />
                <label>By city</label>
                <input type="radio" name="search_type" value="By specialization" />
                <label>By specialization</label>
                <input type="radio" name="search_type" value="By name" />
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
                $result = NULL;
                if($search_type == $types_of_searches[0]) {
                    $sql = "SELECT * FROM doctors WHERE doctor_city LIKE %$search_query%";
                } else if($search_type == $types_of_searches[1]) {
                    $sql = "SELECT * FROM doctors WHERE doctor_type LIKE %$search_query%";
                } else if($search_type == $types_of_searches[2]) {
                    $sql = "SELECT * FROM doctors WHERE first_name LIKE %$search_query% OR last_name LIKE %$search_query$";
                } else {
                    $result = "No such doctors found";
                }
    
                if($result == "No such doctors found") {
                    echo $result;
                } else {
                    $result = NULL;
                    if(isset($conn)) {
                        $result = mysqli_query($conn, $sql);
                    }

                    if(mysqli_num_rows($result) > 0) {
                        echo "<table><tr><th>First Name</th><th>Last Name</th><th>Specialization</th><th>City</th></tr>";
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["first_name"] . "</td>";
                            echo "<td>" . $row["last_name"] . "</td>";
                            echo "<td>" . $row["doctor_type"] . "</td>";
                            echo "<td>" . $row["doctor_city"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No such doctos found";
                    }
                }
            } else {
                $sql = "SELECT * FROM doctors";
                $result = NULL;

                if(isset($conn)) {
                    $result = mysqli_query($conn, $sql);
                }

                echo "<table><tr><th>First Name</th><th>Last Name</th><th>Specialization</th><th>City</th></tr>";
                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>" . $row["doctor_type"] . "</td>";
                    echo "<td>" . $row["doctor_city"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>


    </body>
</html>