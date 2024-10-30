<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gallery</title>
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

$dateValue = date('Y-m-d', strtotime($row['tanggal']));
?>

<body>

    <div class="container my-5">
        <div class="text-center text-warning fs-1">Edit Gallery</div>

        <form action="editgallery.php" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="" class="mb-2">Judul</label>
                <input type="text" name="in_judul" value="<?php echo $row['judul_foto'] ?>" class="form-control"
                    placeholder="Judul apa yang mau anda masukkan" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="mb-3">
                <p><img src="foto_galeri/<?php echo $row['foto'] ?>" style="width: 150px"></p>
                <label for="inputGroupFile01">Upload</label>
                <input type="file" name="in_foto" class="form-control" id="inputGroupFile01">
            </div>

            <div class="mb-3">
                <select class="form-select" name="select" id="selectMenu" aria-label="Default select example">
                    <option value="1" <?php if ($row['select'] == 1) echo 'selected'; ?>>One</option>
                    <option value="2" <?php if ($row['select'] == 2) echo 'selected'; ?>>Two</option>
                    <option value="3" <?php if ($row['select'] == 3) echo 'selected'; ?>>Three</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="">Tanggal</label>
                <input type="date" name="tanggal" value="<?php echo $dateValue?>">
            </div>

            <div class="mb-3">
                <label for="" class="mb-2">Keterangan</label>
                <input type="text" value="<?php echo $row['ket_foto'] ?>" class="form-control"
                    placeholder="Keterangan apa yang mau anda masukkan" aria-label="Sizing example input" name="in_ket"
                    aria-describedby="inputGroup-sizing-default">
            </div>

            <input type="hidden" name="id_galeri" value="<?php echo $row['id_galeri'] ?>">

            <button type="submit" class="btn btn-outline-warning">Simpan</button>
        </form>
    </div>
</body>

</html>