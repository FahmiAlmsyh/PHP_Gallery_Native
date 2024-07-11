<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="container my-5">
        <div class="text-center text-primary fs-1">Gallery</div>
    <a href="galeri.php" class="btn btn-primary">Create Gallery</a>
<table class="table ">
  <thead>
    <tr>
      <th scope="col">Nomor</th>
      <th scope="col">Foto</th>
      <th scope="col">Judul</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
    include "config.php";
    $no = 1;
    $sql = mysqli_query($connect, "SELECT * FROM list");
    while ($row = mysqli_fetch_array($sql)) { ?>
    <tr>
      <th scope="row"><?php echo $no++; ?></th>
      <td>
                <?php
                $imagePath = "foto_galeri/" . $row['foto'];
                if (file_exists($imagePath)) {
                    echo '<img src="' . $imagePath . '" style="width: 50px">';
                } else {
                    echo "Image not found: " . $imagePath;
                }
                ?>
            </td>
      <td><?php echo $row['judul_foto']; ?></td>
      <td><?php echo $row['ket_foto']; ?></td>
            <td style="width:5%">
            <a href="delete.php?ID=<?php echo $row['id_galeri'] ?>" class="btn btn-outline-danger"><i
            class="fa-solid fa-check"></i></a>
            </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
</body>
</html>