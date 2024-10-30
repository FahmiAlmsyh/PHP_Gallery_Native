<?php
session_start();
include('config.php');

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

<style>
  .image-konten {
    height: 20vh;
    width: 30vh;
    overflow: hidden !important;
  }

  .image-konten img {
    object-fit: cover;
    width: 100%;
    height: 100%;
  }
</style>

<style>
  .carousel-item {
    height: 50vh;
    /* Atur tinggi kontainer carousel */
    overflow: hidden;
    /* Sembunyikan bagian gambar yang berlebih */
  }

  .carousel-item img {
    object-fit: cover;
    /* Potong bagian gambar yang berlebih */
  }

  .horizontal-scroll {
    display: flex;
    overflow-x: auto;
    padding: 10px;
    border: 1px solid #ccc;
    /* Optional: To visualize the container */
  }

  .item {
    flex: 0 0 auto;
    /* Prevent items from shrinking */
    width: 150px;
    /* Set width for each item */
    margin-right: 10px;
    background-color: #f0f0f0;
    text-align: center;
    padding: 20px;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    /* Optional: Add some shadow */
  }
</style>

<style>
  th,
  td {
    white-space: nowrap;
  }
</style>

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

    <div id="carouselExampleIndicators" class="carousel slide mt-5">
      <div class="carousel-indicators">
        <?php
        include "config.php";
        $sql = mysqli_query($connect, "SELECT * FROM list");
        $active = 'active';
        $i = 0;
        while ($row = mysqli_fetch_array($sql)):
          ?>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i ?>"
            class="<?= $active ?>" aria-current="true" aria-label="Slide <?= ($i + 1) ?>"></button>
          <?php
          $active = '';
          $i++;
        endwhile;
        ?>
      </div>
      <div class="carousel-inner">
        <?php
        include "config.php";
        $sql = mysqli_query($connect, "SELECT * FROM list");
        $active = 'active';
        while ($row = mysqli_fetch_array($sql)):
          ?>
          <div class="carousel-item <?= $active ?>">
            <img src="foto_galeri/<?= $row['foto'] ?>" class="d-block w-100 h-100" alt="...">
          </div>
          <?php
          $active = '';
        endwhile;
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">Nomor</th>
            <th scope="col">Foto</th>
            <th scope="col">Judul</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Telp</th>
            <th scope="col">Select</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include "config.php";
          $no = 1;
          $sql = mysqli_query($connect, "SELECT * FROM list");
          while ($row = mysqli_fetch_array($sql)) {
            $fullText = $row['ket_foto'];
            $maxLength = 10;

            if (strlen($fullText) > $maxLength) {
              $short_text = substr($fullText, 0, $maxLength) . '...';
            } else {
              $short_text = $fullText;
            }

            ?>
            <tr>
              <th scope="row"><?php echo $no++; ?></th>
              <td>
                <?php
                $imagePath = "foto_galeri/" . $row['foto'];
                if (file_exists($imagePath)) {
                  echo '<div class="image-konten"><img src="' . $imagePath . '"></div>';
                } else {
                  echo "Image not found: " . $imagePath;
                }
                ?>
              </td> 
              <td><?php echo $row['judul_foto']; ?></td>
              <td><?php echo $short_text ?></td>
              <td><?php echo $row['telp']; ?></td>
              <td><?php echo $row['select']; ?></td>
              <td><?php echo $row['tanggal']; ?></td>
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
                  <a href="delete.php?ID=<?php echo $row['id_galeri'] ?>" class="btn btn-outline-danger"
                    onclick="return confirm('Anda yakin ingin menghapus?')"><i class="fa-solid fa-check "></i></a>
                </td>
              <?php endif; ?>
            </tr>
          <?php } ?>
        </tbody>
      </table>

      <form action="send_email.php" method="post" class="mt-4">
        <div class="form-group">
          <label for="name">Nama:</label>
          <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="message">Pesan:</label>
          <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Kirim</button>
      </form>
    </div>

    <div class="horizontal-scroll">
      <div class="item">Item 1</div>
      <div class="item">Item 2</div>
      <div class="item">Item 3</div>
      <div class="item">Item 4</div>
      <div class="item">Item 5</div>
      <div class="item">Item 1</div>
      <div class="item">Item 2</div>
      <div class="item">Item 3</div>
      <div class="item">Item 4</div>
      <div class="item">Item 5</div>
      <div class="item">Item 1</div>
      <div class="item">Item 2</div>
      <div class="item">Item 3</div>
      <div class="item">Item 4</div>
      <div class="item">Item 5</div>
    </div>

    <style>
      .pt-100 {
        padding-top: 100px;
      }

      .pb-100 {
        padding-bottom: 100px;
      }

      .section-title {
        margin-bottom: 60px;
      }

      .section-title p {
        color: #777;
        font-size: 16px;
      }

      .section-title h4 {
        text-transform: capitalize;
        font-size: 40px;
        position: relative;
        padding-bottom: 20px;
        margin-bottom: 20px;
        font-weight: 600;
      }

      .section-title h4:before {
        position: absolute;
        content: "";
        width: 60px;
        height: 2px;
        background-color: #ff3636;
        bottom: 0;
        left: 50%;
        margin-left: -30px;
      }

      .section-title h4:after {
        position: absolute;
        background-color: #ff3636;
        content: "";
        width: 10px;
        height: 10px;
        bottom: -4px;
        left: 50%;
        margin-left: -5px;
        border-radius: 50%;
      }

      ul.timeline-list {
        position: relative;
        margin: 0;
        padding: 0
      }

      ul.timeline-list:before {
        position: absolute;
        content: "";
        width: 2px;
        height: 100%;
        background-color: #ff3636;
        left: 50%;
        top: 0;
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
      }

      ul.timeline-list li {
        position: relative;
        clear: both;
        display: table;
      }

      .timeline_content {
        border: 2px solid #ff3636;
        background-color: #fff
      }

      ul.timeline-list li .timeline_content {
        width: 45%;
        color: #333;
        padding: 30px;
        float: left;
        text-align: right;
      }

      ul.timeline-list li:nth-child(2n) .timeline_content {
        float: right;
        text-align: left;
      }

      .timeline_content h4 {
        font-size: 22px;
        font-weight: 600;
        margin: 10px 0;
      }

      ul.timeline-list li:before {
        position: absolute;
        content: "";
        width: 25px;
        height: 25px;
        background-color: #ff3636;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        border-radius: 50%;
      }

      .timeline_content span {
        font-size: 18px;
        font-weight: 500;
        font-family: poppins;
        color: #ff3636;
      }
    </style>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:400,500,600,700" rel="stylesheet">
    <section class="experience pt-100 pb-100" id="experience">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 mx-auto text-center">
            <div class="section-title">
              <h4>bootstrap 5 timeline</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-12">
            <ul class="timeline-list">
              <!-- Single Experience -->
              <?php
              $sql = mysqli_query($connect, "SELECT * FROM list");
              while ($row = $sql->fetch_object()) {
                ?>
              <li>
                <div class="timeline_content">
                  <span><?= $row->foto ?></span>
                  <h4>Intern Developer span</h4>
                  <p>We gather your business and products information. We then determine the direction of the project
                    and understand your goals and we combine your ideas with ours for an amazing website.</p>
                </div>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </section>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>