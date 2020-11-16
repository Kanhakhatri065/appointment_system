<?php
require("database_connection.php");
if (isset($_SESSION['patient_email'])) {
    header('location: book_appointments.php');
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
         <form action="login_patient_submit.php" method="POST">
             <input type="email"   placeholder="Email" name="e-mail" required = "true">
             <input type="password"  placeholder="Password" name="password" required = "true">
        </form>
        
    </body>
</html>
