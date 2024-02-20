<?php
session_start();
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
    <h2>Sign in Page</h2>
    <?php
    // if(isset($_SESSION['msg'])){
    //     echo $_SESSION['msg'];
    // }else{
    //     echo $_SESSION['msg'];
    // }
    ?>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Emaill address">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Password">
        <input type="submit" value="Login" name="submit">
        <h5>Forget password? <a href="recover_email.php">Forget</a></h5>
        <h5>Don't have an account? <a href="signup.php">Sign up here!</a></h5>
    </form>
</body>
</html>
