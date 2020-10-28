<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="sign_up_patient_process.php" method="POST">
        <label>Username: </label>
        <input type="text" name="username" autofocus />

        <label>First Name: </label>
        <input type="text" name="first_name" />

        <label>Last Name: </label>
        <input type="text" name="last_name" />

        <label>City: </label>
        <input type="text" name="city" />

        <label>Email: </label>
        <input type="email" name="email_id">

        <label>Password: </label>
        <input type="password" name="password">

        <input type="submit" name="Submit" value="Submit" />
    </form>
    <?php
    echo "hello"
    ?>
</body>
</html>