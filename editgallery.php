<?php
include ("config.php");

$judul = $_POST['in_judul'];
$ket = $_POST['in_ket'];
$var_id = $_POST['id_galeri'];
$foto = $_FILES['in_foto']['tmp_name'];
$nama = time() . ".png";

// Fetch the current photo's name from the database
$query = "SELECT foto FROM list WHERE id_galeri = $var_id";
$result = mysqli_query($connect, $query);
$currentPhoto = mysqli_fetch_assoc($result)['foto'];

// Process the photo update
if (!empty($foto)) {
    // Delete the old photo file if it exists
    if (!empty($currentPhoto) && file_exists("foto_galeri/" . $currentPhoto)) {
        unlink("foto_galeri/" . $currentPhoto);
    }
    
    // Upload the new photo
    move_uploaded_file($foto, "foto_galeri/" . $nama);
    $query = "UPDATE list SET judul_foto='$judul', ket_foto='$ket', foto='$nama' WHERE id_galeri=$var_id";
} else {
    $query = "UPDATE list SET judul_foto='$judul', ket_foto='$ket' WHERE id_galeri=$var_id";
}

mysqli_query($connect, $query);
header("location: index.php");
?>
