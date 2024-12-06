<?php 
session_start();
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
  echo "<script>
  alert('Belum Login');
  location.href='../index.php';
  </script>";
  
}
?>

<!DOCTYPE HTML>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <title>Galery Foto</title>

    <!--CSS Link-->

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    

    <!--Font-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">

</head>

<style>
        .card img {
            height: 250px;
            object-fit: cover;
            
        }

        .footer {
            padding: 0;
            margin: 0;
            font-size: 0.6rem; 
        }
        .nav {
            background-color: #333333;
        }
        .bodycl {
            background-color: #E1F4F3;
        }
        .footercl {
            background-color: #706C61;
        }
        .navbar-toggler {
            border: 2px solid #ffffff;
        }
        
</style>

<body class="bodycl">

    <nav class="navbar navbar-expand-lg nav">
        <div class="container">
        <a class="card" style="background-color: transparent; border: none;" href="index.php">
        <img src="../asset/light-logo.png" style="max-width: 100%; height: auto; max-height: 100px;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> 
          </button>
          <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto">
              <a href="home.php" class="text-light nav-link">Home</a>
              <a href="album.php" class="text-light nav-link">Album</a>
              <a href="foto.php" class="text-light nav-link">Foto</a>
            </div>

            <a href="../config/aksi_logout.php" class="btn btn-outline-light m-1">Logout</a>

          </div>
        </div>
      </nav>

      <div class="container mt-2">
        <div class="row">
          <?php
        $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.`user-id`=user.`user-id` INNER JOIN album ON foto.albumid=album.albumid");
        while($data = mysqli_fetch_array($query)){ ?>
        <div class="col-md-3 mt-3">
        <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">
            <div class="card border-dark">
                <img src="../img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                <div class="card-footer text-left">
                        
                        <?php
                        $userid = $_SESSION['user-id'];
                        $fotoid = $data['fotoid'];
                        $jfoto = $data['judulfoto'];
                        $ceklike = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND `user-id`='$userid'");
                        if (mysqli_num_rows($ceklike) == 1) { ?>
                        <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid']?>" type="submit" name="cancellike"><i class="fa fa-heart"></i></a>
                        <?php }else{ ?>
                        <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid']?>" type="submit" name="like"><i class="fa-regular fa-heart"></i></a>

                        <?php } 
                        $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                        echo mysqli_num_rows($like). ' Like';
                        ?>
                        <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>"><i class="fa-regular fa-comment"></i></a>
                        <?php 
                          $jmlkomen = mysqli_query($koneksi, "SELECT * FROM `komentar-foto` WHERE fotoid='$fotoid'");
                          echo mysqli_num_rows($jmlkomen).' komentar';
                        ?>
                        <hr>
                        <p>
                          <?php 
                          $judulfotoQuery = mysqli_query($koneksi, "SELECT * FROM foto WHERE judulfoto='$jfoto'");
                          if ($judulfotoQuery) {
                            
                            $fotoData = mysqli_fetch_assoc($judulfotoQuery);
                              
                            if ($fotoData) {
                                echo $fotoData['judulfoto']; }} ?>
                          </p>
                    </div>
                </div>
              </a>
              <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-8">
                        <img src="../img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                        </div>
                        <div class="col-md-4">
                          <div class="md-2">
                            <div class="overflow-auto">
                              <div class="sticky-top">
                                <strong><?php echo $data['judulfoto'] ?></strong><br>
                                <span class="badge bg-secondary"><?php echo $data['namalengkap'] ?></span>
                                <span class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>
                                <span class="badge bg-primary"><?php echo $data['albumid'] ?></span>
                              </div>
                              <hr>
                              <!-- eror start -->
                              <p>
                                <?php echo $data['deskripsifoto'] ?>
                              </p>
                              <hr>
                              <b>Komentar :</b>
                              <?php
                              $fotoid = $data['fotoid'];
                              $komentar = mysqli_query($koneksi,"SELECT * FROM `komentar-foto` INNER JOIN user ON `komentar-foto`.`user-id`=user.`user-id` WHERE `komentar-foto`.fotoid='$fotoid'");
                              while($row = mysqli_fetch_array($komentar)){
                              ?>
                              <p>
                                <strong><?php echo $row['namalengkap'] ?></strong>
                                <?php echo $row['isi-komentar'] ?>
                              </p>
                              <?php } ?>
                              <hr>
                              <!-- eror end -->
                              <div class="sticky-bottom">
                                <form action="../config/proses_komentar.php" method="POST">
                                  <div class="input-group">
                                    <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                    <input type="text" name="isi-komentar" class="form-control" placeholder="Tambah Komentar">
                                    <div class="input-group-prepend">
                                      <button type="submit" name="kirimkomentar" class="btn btn-outline-primary">Kirim</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>

      <footer class="footer text-white text-center footercl fixed-bottom">
            <p>&copy; UKK RPL | YausyuAYSAUYSUA </p>
      </footer>
    <script type="text/javascript" src="../js/bootstrap.min.js"> </script>
</body>
</html>