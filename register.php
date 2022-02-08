<?php
    session_start();
    require_once('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
        form {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php 
        if(isset($_SESSION['error'])){
            foreach ($_SESSION['error'] as $error){
                echo "<p style='color:red'>". $error . "</p>";
            }
        }
        session_unset(); 
    ?>
    <form action="process.php" method="post">
        <h1>Register Here!</h1>
        First Name: <input type="text" name="fname"><br><br>
        Last Name: <input type="text" name="lname"><br><br>

        Email: <input type="text" name="email"><br><br>
        Contact Number: <input type="text" name="c_number"><br><br>

        Password: <input type="password" name="password"><br><br>
        Confirm Password: <input type="password" name="c_password"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>