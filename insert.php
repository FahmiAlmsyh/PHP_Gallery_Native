<?php
include ('config.php');

$judul = $_POST['in_judul'];
$ket = $_POST['in_ket'];
$select = $_POST['select'];
$tanggal = $_POST['tanggal'];
$telp = $_POST['telp'];
$foto = $_FILES['in_foto']['tmp_name'];
$nama = time() . ".png";

move_uploaded_file($foto, "foto_galeri/" . $nama);

$sql = "INSERT INTO list(judul_foto,ket_foto,foto, `select`, tanggal, telp) VALUES('$judul','$ket','$nama', $select, '$tanggal', '$telp')";
mysqli_query($connect, $sql);
header("location: index.php");
?>