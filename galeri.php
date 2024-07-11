<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Gallery</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <div class="container my-5">
        <div class="text-center text-success fs-1">Create Gallery</div>
        <form action="insert.php" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="" class="mb-2">Judul</label>
                <input type="text" name="in_judul" class="form-control" placeholder="Judul apa yang mau anda masukkan"
                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="mb-3">
                <label for="inputGroupFile01">Upload</label>
                <input type="file" name="in_foto" class="form-control" id="inputGroupFile01">
            </div>

            <div class="mb-3">
                <label for="" class="mb-2">Keterangan</label>
                <input type="text" class="form-control" placeholder="Keterangan apa yang mau anda masukkan"
                    aria-label="Sizing example input" name="in_ket" aria-describedby="inputGroup-sizing-default">
            </div>

            <button type="submit" class="btn btn-outline-success">Simpan</button>
        </form>
    </div>
</body>

</html>