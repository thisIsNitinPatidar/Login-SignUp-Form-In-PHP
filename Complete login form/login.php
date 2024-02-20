<?php 
session_start();

include 'connection.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $q = "SELECT * FROM login WHERE email='$email'";
    $res = mysqli_query($con, $q);

    if ($res && mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_array($res);
        $hash = $row['password'];
        $status = $row['status'];

        if ($status == 'active') {
            if (password_verify($pass, $hash)) {
                $_SESSION['email'] = $email;
                header('location: home.php');
                exit();
            } else {
                echo "<script>alert('Data not matched.'); window.location.href='signin.php';</script>";
            }
        } else {
            echo "<script>alert('Please check your email and click the link sent to activate your account.'); window.location.href='signin.php';</script>";
        }
    } else {
        echo "<script>alert('User Not Found.'); window.location.href='signup.php';</script>";
    }
}
$con->close();
?>
