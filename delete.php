<?php
include ('config.php');

$ID = $_GET['ID'];


$query = "SELECT foto FROM list WHERE id_galeri = '$ID'";
$result = mysqli_query($connect, $query);
$currentPhoto = mysqli_fetch_assoc($result)['foto'];


if (!empty($currentPhoto) && file_exists("foto_galeri/" . $currentPhoto)) {
    unlink("foto_galeri/" . $currentPhoto);
}


mysqli_query($connect, "DELETE FROM list WHERE id_galeri = '$ID'");

header("Location: index.php");
?>