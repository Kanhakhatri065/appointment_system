<!DOCTYPE html>
<?php
include('database_connection.php');
$id="peddivarunkumar98@gmail.com";
$select_query="select * from doctors where doctor_email='$id'";
$select_query_result=mysqli_query($conn,$select_query) or die(mysqli_error($conn)); 
$row=mysqli_fetch_array($select_query_result);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient profile</title>
</head>
<body>
    <h3>Doctor details</h3>
    <table>
        <tr>
            <td>
                User name:
            </td>
            <td>
                <?php echo $row["doctor_username"];?>
            </td>
        </tr>
        <tr>
            <td>
                first_name:
            </td>
            <td>
                <?php echo $row["first_name"];?>
            </td>
        </tr>
        <tr>
            <td>
               Specilization:
            </td>
            <td>
                <?php echo $row["doctor_type"];?>
            </td>
        </tr>
        <tr>
            <td>
               City:
            </td>
            <td>
                <?php echo $row["doctor_city"];?>
            </td>
        </tr>
        <tr>
            <td>
               Email:
            </td>
            <td>
                <?php echo $row["doctor_email"];?>
            </td>
        </tr>
        
    </table>
    
</body>
</html>