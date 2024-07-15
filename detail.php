<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Gallery</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<?php
include ('config.php');
$ID = $_GET['ID'];
$getdata = mysqli_query($connect, "SELECT * FROM list WHERE id_galeri='$ID'");
$row = mysqli_fetch_array($getdata);
?>
<body>

<div class="container my-5">
    <div class="text-center fs-1 text-info">Detail Gallery</div>

    <div class="row my-4">
        <div class="col">
        <img src="foto_galeri/<?php echo $row['foto']?>" class="img-thumbnail" alt="...">
        </div>

        <div class="col">
            <h1><?php echo $row['judul_foto']?></h1>
            <p><?php echo $row['ket_foto']?></p>
        </div>
    </div>
</div>

</body>
</html>