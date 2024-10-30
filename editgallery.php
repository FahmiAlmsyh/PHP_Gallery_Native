<?php
include ("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['in_judul'];
    $ket = $_POST['in_ket'];
    $var_id = $_POST['id_galeri'];
    $select = $_POST['select'];
    $tanggal = $_POST['tanggal'];
    $foto = $_FILES['in_foto']['tmp_name'];
    $nama = time() . ".png";

    
    $query = "SELECT foto FROM list WHERE id_galeri = $var_id";
    $result = mysqli_query($connect, $query);
    $currentPhoto = mysqli_fetch_assoc($result)['foto'];

    
    if (!empty($foto)) {
        
        if (!empty($currentPhoto) && file_exists("foto_galeri/" . $currentPhoto)) {
            unlink("foto_galeri/" . $currentPhoto);
        }
        
        
        move_uploaded_file($foto, "foto_galeri/" . $nama);
        $query = "UPDATE list SET judul_foto='$judul', ket_foto='$ket', foto='$nama', `select` = '$select', tanggal = '$tanggal' WHERE id_galeri=$var_id";
    } else {
        $query = "UPDATE list SET judul_foto='$judul', ket_foto='$ket', `select` = '$select', tanggal = '$tanggal' WHERE id_galeri=$var_id";
    }

    mysqli_query($connect, $query);
    header("location: index.php");
    exit();
}
?>
