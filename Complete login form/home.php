<?php
session_start();

include 'connection.php';
if (!isset($_SESSION["email"])) {
    header("Location: signin.php");
    exit();
}

if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: signin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
            <a href="home.php">Home</a>
            <a href="home.php?logout=true">Logout</a>
    </nav>

    <h1>Welcome to Our Website</h1>
    <p>Thank you for visiting our website. We hope you enjoy your time here.</p>
</body>
</html>
