<?php
session_start();
include 'connection.php';

if(isset($_POST['submit'])){
    if(isset($_GET['token'])){
        $token=$_GET['token'];
        $email=$_GET['email'];
        $pass=$_POST['password'];
        $password=password_hash($pass,PASSWORD_BCRYPT);


        if($pass !== $_POST['cpassword']) {
            $_SESSION['passmsg']="Passwords do not match";
            echo "<script>alert('Passwords do not match.'); window.location.href='signup.php';</script>";
            exit();
        }


        $check_query = "SELECT * FROM login WHERE email='$email' AND token='$token'";
        $check_result = mysqli_query($con, $check_query);
        if($check_result && mysqli_num_rows($check_result) > 0) {
            $row = mysqli_fetch_assoc($check_result);

            $new_token = bin2hex(random_bytes(15));

            $update= "UPDATE login SET password='$password', token='$new_token' WHERE email='$email'";
            $query=mysqli_query($con, $update);
            if($query){
                echo "<script>alert('Your password has been updated.');window.location.href='signin.php';</script>";
            }else{
                $_SESSION['passmsg']="Your password has not been updated.";
                header('location:reset_password.php');
            }
        } else {
            echo "<script>alert('Invalid or expired token.');window.location.href='signin.php';</script>";
        }
    }
}

$con->close();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Create Password</h2>
    <?php  
    if(isset($_SESSION['passmsg'])){
        echo $_SESSION['passmsg'];
    } else {
        echo "";
    }
    ?>
    <form action="" method="post">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="New Password">
        <label for="cpassword">Confirm Password:</label>
        <input type="password" id="cpassword" name="cpassword" placeholder="Confirm password">
        <input type="submit" value="Update password" name="submit">
    </form>
</body>
</html>
>
