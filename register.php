<?php
include('config.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

mysqli_query($connect, "INSERT INTO users(name, email ,password) VALUES('$name', '$email', '$password')");

header('location:index.php');