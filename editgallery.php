<?php
include ("config.php");
$judul = $_POST['in_judul'];
$ket = $_POST['in_ket'];
$var_id = $_POST['id_galeri'];
//mengambil nilai gambar
$foto = $_FILES['in_foto']['tmp_name'];
//membuat nama baru untuk gambar
$nama = time() . ".png";
//proses upload foto
if (!empty($foto)) {
    move_uploaded_file($foto, "foto_galeri/" . $nama);
    $query = "UPDATE list SET judul_foto= '$judul', ket_foto='$ket', foto='$nama' WHERE id_galeri = $var_id";
} else {
    $query = "UPDATE list SET judul_foto='$judul', ket_foto='$ket' WHERE id_galeri = $var_id";
}

mysqli_query($connect, $query);
header("location: index.php");
?>