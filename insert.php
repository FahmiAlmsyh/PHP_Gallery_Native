<?php
include ('config.php');

//mengambil nilai input dari form
$judul = $_POST['in_judul'];
$ket = $_POST['in_ket'];
//mengambil nilai gambar
$foto = $_FILES['in_foto']['tmp_name'];
//membuat nama baru untuk gambar
$nama = time() . ".png";

//proses upload foto
move_uploaded_file($foto, "foto_galeri/" .
$nama);
//proses insert ke database
$sql = "INSERT INTO list(judul_foto,ket_foto,foto) VALUES('$judul','$ket','$nama')";
mysqli_query($connect, $sql);
header("location: index.php");
?>
