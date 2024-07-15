<?php
session_start();
include ('config.php');

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user']);
$userName = "";
$userEmail = "";

if ($isLoggedIn) {
  // Retrieve user information
  $user = $_SESSION['user'];
  $userName = $user['name'];
  $userEmail = $user['email'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
  <div class="container my-5">
    <div class="text-center text-primary fs-1">Gallery</div>
    <div class="d-flex justify-content-between mt-3">
      <?php if ($isLoggedIn): ?>
        <div class="create">
          <a href="galeri.php" class="btn btn-primary">Create Gallery</a>
        </div>
        <div class="login">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              User
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item"><?php echo $userName ?></a></li>
              <li><a class="dropdown-item"><?php echo $userEmail ?></a></li>
              <li>
                <form class="dropdown-item" action="logout.php" method="post">
                  <button type="submit" class="btn btn-danger">Logout</button>
                </form>
              </li>
            </ul>

          </div>

        </div>
      <?php else: ?>
        <div class="login">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register">
            Register
          </button>

          <!-- Register Modal -->
          <div class="modal fade" id="register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form action="register.php" method="post">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="registerModalLabel">Register</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="exampleInputName" class="form-label">Name *</label>
                      <input required type="text" name="name" class="form-control" id="exampleInputName"
                        aria-describedby="nameHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address *</label>
                      <input required type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password *</label>
                      <input required type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#login">
            Login
          </button>

          <!-- Login Modal -->
          <div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form action="login.php" method="post">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loginModalLabel">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="loginEmail" class="form-label">Email address *</label>
                      <input required type="email" name="email" class="form-control" id="loginEmail"
                        aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="loginPassword" class="form-label">Password *</label>
                      <input required type="password" name="password" class="form-control" id="loginPassword">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      <?php endif; ?>
    </div>

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
                echo '<img src="' . $imagePath . '" style="width: 150px">';
              } else {
                echo "Image not found: " . $imagePath;
              }
              ?>
            </td>
            <td><?php echo $row['judul_foto']; ?></td>
            <td>
              <?php
              $text = $row['ket_foto'];
              $maxWords = 2;
              $words = explode(' ', $text);

              if (count($words) > $maxWords) {
                $shortText = implode(' ', array_slice($words, 0, $maxWords)) . '...';
              } else {
                $shortText = $text;
              }

              echo $shortText;
              ?>
            </td>
            <td style="width:5%">
              <a href="detail.php?ID=<?php echo $row['id_galeri'] ?>" class="btn btn-outline-info"><i
                  class="fa-solid fa-circle-info"></i></a>
            </td>
            <?php if ($isLoggedIn): ?>
            <td style="width:5%;">
              <a href="edit.php?ID=<?php echo $row['id_galeri'] ?>" class="btn btn-outline-warning"><i
                  class="fa-solid fa-pen"></i></a>
            </td>
            <td style="width:5%">
              <a href="delete.php?ID=<?php echo $row['id_galeri'] ?>" class="btn btn-outline-danger"><i
                  class="fa-solid fa-check"></i></a>
            </td>
            <?php else: ?>
              <?php endif; ?>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>