<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Sign up Page</h2>
    <form action="registration.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Name" >
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Emaill address">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Password">
        <label for="cpassword">Confirm Password:</label>
        <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password">
        <input type="submit" value="Sign up" name="submit">
        <h5>Already have an account? <a href="signin.php">Login</a></h5>
    </form>
</body>
</html>
