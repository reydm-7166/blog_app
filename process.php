<?php
    session_start();
    require_once('connection.php');
    
        if(isset($_POST['login'])) {
            login($_POST, $connection);
        }
        if(isset($_POST['logout'])){
            $_SESSION['logout'] = "<h1>Successfully Logged out!</h1>";
            header('Location: login.php');
        }

        if(isset($_POST['reset_now'])){
            $fetch_data = "SELECT password, contact_num FROM `users`
            WHERE users.contact_num = '{$_POST['contact_num_reset']}'";   

            $data = mysqli_query($connection, $fetch_data);
            $row = mysqli_fetch_assoc($data);

            if(!empty($row)){
                $encrypted = md5('Village88');

                $update_pass = "UPDATE `users` 
                                SET `password`= '$encrypted' 
                                WHERE contact_num = '09510173120';";

                if(mysqli_query($connection, $update_pass)) {
                    $_SESSION['reset'] = "Successfully Reset! New Password is Village88";
                    header('Location: login.php');
                } else {
                    $_SESSION['nomatch'] = " Sorry. No Contact Number Matched!";
                    header('Location: login.php');
                }
            }
        }

        if(isset($_POST['submit_review'])){
            var_dump($_POST);
            review_insert($_POST, $connection);
        }

        if(isset($_POST['reply'])) {
            reply_insert($_POST, $connection);
        }

        function review_insert($review, $connection){
            $_SESSION['error'] = array();
            date_default_timezone_set('Asia/Manila');
            $date_today = date('Y-m-d H:i:s');
            if(!isset($_SESSION['users_name'])){
                $_SESSION['error'][] = "<h1 class='warning'>You must be logged in to post review!</h1>";
            }
            if(strlen($review['review']) < 20){
                $_SESSION['error'][] = "<h1 class='warning'>Review not long enough. Must be above 20 characters!</h1>";
            }
            if(empty($review['review'])) {
                $_SESSION['error'][] = "<h1 class='warning'>Review cannot be empty!</h1>";
            }
            if(empty($_SESSION['error'])){
                $insert = "INSERT INTO `reviews`(`users_id`,`content`, `update_at`) VALUES ('{$_SESSION['users_id']}', '{$review['review']}', '$date_today')";
                if(mysqli_query($connection, $insert)) {
                    header('Location: index.php');
                }
            }
            header('Location: index.php');
        }

        function reply_insert($reply, $connection) {
            date_default_timezone_set('Asia/Manila');
            $date_today = date('Y-m-d H:i:s');
            
            if(empty($reply['reply_content'])) {
                $_SESSION['error'][] = "<h1 class='warning'>Reply cannot be empty!</h1>";
            }
            if(!isset($_SESSION['users_name'])){
                $_SESSION['error'][] = "<h1 class='warning'>You must be logged in to post review!</h1>";
            }
            if(empty($_SESSION['error'])){
                $insert = "INSERT INTO `replies`(`users_id`, `reviews_id`, `content`, `updated_at`) 
                    VALUES ('{$_SESSION['users_id']}','{$reply['review_id']}','{$reply['reply_content']}','$date_today')";
                if(mysqli_query($connection, $insert)) {
                    header('Location: index.php');
                } 
            }
            header('Location: index.php');     
        }
        
        function login($login_check, $connection){
            $login_check['pass'] = md5($login_check['pass']);

            $fetch_data = "SELECT *, CONCAT(first_name, ' ',last_name) AS fullname FROM `users`
            WHERE users.email = '{$login_check['email']}' && users.password = '{$login_check['pass']}'";
  
            $data = mysqli_query($connection, $fetch_data);
            $row = mysqli_fetch_assoc($data);
            if(!empty($row)){
                $_SESSION['welcome'] = "<h1> Welcome ". $row['fullname']. "</h1>";
                $_SESSION['users_id'] = $row['id'];
                $_SESSION['users_name'] = $row['first_name'];
                header('Location: index.php');
            } else {
                $_SESSION['login_error'] = "<h1>Wrong Email or Password!</h1>";
                header('Location: login.php');
            }
        }   
            
        
            // if($login_check['email'] )
   
?>