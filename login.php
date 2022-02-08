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
    <title>Log In</title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php if(isset($_SESSION['login_error'])){ ?>
        <h1><?= $_SESSION['login_error'] ?>
    <?php session_unset(); } ?>

    <?php if(isset($_SESSION['logout'])){ ?>
        <h1><?= $_SESSION['logout'] ?></h1>
    <?php session_unset();} ?>
    
    <?php if(isset($_SESSION['reset'])){ ?>
        <h1><?= $_SESSION['reset'] ?></h1>
    <?php session_unset();} ?>


    <form action="process.php" method="post">
        Email: <input type="text" name="email"><br><br>
        Password: <input type="password" name="pass"><br><br>
        <input type="submit" name="login" value="Login"><br><br>
    </form>

    <form action="process.php" method="post">
        Reset Password: <input type="submit" name="reset" value="reset">
    </form>
</body>
</html>