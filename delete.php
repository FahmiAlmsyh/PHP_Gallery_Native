<?php
include('config.php');

$ID = $_GET['ID'];

// Fetch the current photo's name from the database
$query = "SELECT foto FROM list WHERE id_galeri = '$ID'";
$result = mysqli_query($connect, $query);
$currentPhoto = mysqli_fetch_assoc($result)['foto'];

// Delete the photo file if it exists
if (!empty($currentPhoto) && file_exists("foto_galeri/" . $currentPhoto)) {
    unlink("foto_galeri/" . $currentPhoto);
}

// Delete the record from the database
mysqli_query($connect, "DELETE FROM list WHERE id_galeri = '$ID'");

// Redirect to the index page
header("Location: index.php");
?>
