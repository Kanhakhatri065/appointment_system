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
        <link rel="stylesheet" href="css/loginpagesstyle.css">
    </head>

    <body>
    <center>
        <div style="margin-top:100px;background-color:#9AD3BC;">
        <h3>Login</h3>
         <form action="login_process_doctor.php" method="POST">
             <table>
                 <tr>
                     <td>
             <input type="email"   placeholder="Email" name="email_id" required = "true">
                     </td>
             </tr>
             <tr>
                 <td>
             <input type="password"  placeholder="Password" name="password" required = "true">
                 </td>
             </tr>
             
             </table>
             <input type="submit">
        </form>
        </div>
    </center>
    </body>
</html>
