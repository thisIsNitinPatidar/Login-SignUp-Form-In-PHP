<?php
session_start();
include 'connection.php';

if(isset($_POST['submit'])){
    $email=$_POST['email'];
 
    $check_query = "SELECT * FROM login WHERE email='$email'";
    $check_result = mysqli_query($con, $check_query);
    if ($check_result) {
        $row = mysqli_fetch_assoc($check_result); // Fetching the row from the result set
        if ($row) {
            $username = $row['name'];
            $token = $row['token'];
            $to_email = $email;
            $sender_name = "Mr Vishu."; 
            $subject = "Reset Your Password";
            $body = "Hi $username, click here to reset your password: 
                    http://localhost/t/Complete%20login%20form/reset_password.php?email=$email&token=$token";
            $headers = "From: mrsingh060698@gmail.com";

            if (mail($to_email, $subject, $body, $headers)) {
                echo "<script>alert('Check your email to reset your account $email');</script>";
            } else {
                echo "Email sending failed...";
            }
        } else {
            echo "No email found.."; 
        }
    } else {
        echo "Query execution failed.."; 
    }
    $con->close();
}
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Forget Page</h2>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Emaill address">
        <input type="submit" value="Send mail" name="submit">
        <h5>Forget password? <a href="recover_email.php">Forget</a></h5>
        <h5>Have an account? <a href="signin.php">Sign up here!</a></h5>
    </form>
</body>
</html>
