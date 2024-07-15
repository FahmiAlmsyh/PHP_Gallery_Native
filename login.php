<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($connect, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $user;
        header('Location: index.php');
    } else {
        echo "Invalid email or password.";
    }
}
?>
