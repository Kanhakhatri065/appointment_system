<?php
require("database_connection.php");
if (isset($_SESSION['doctor_email'])) {
    header('location: doctorprofile.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <title>Login | doctor</title>
    </head>

    <body>
        <h3>Login</h3>
         <form action="login_process_doctor.php" method="POST">
             <input type="email"   placeholder="Email" name="email_id" required = "true">
             <input type="password"  placeholder="Password" name="password" required = "true">
             <input type="submit">
        </form>
        
    </body>
</html>
