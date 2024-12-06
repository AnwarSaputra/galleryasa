<?php 
session_start();
ob_start();
include'../config/koneksi.php';
ob_end_clean(); 

if ($_SESSION['status'] !='login') {
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
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">

</head>
<style>

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

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-2 border-dark">
                    <div class="card-header">Add Album</div>
                    <div class="card-body">
                        <form action="../config/aksi_album.php" method="POST">
                            <label class="form-label">Nama Album</label>
                            <input type="text" name="namaalbum" class="form-control" required>
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" required></textarea>
                            <button type="submit" class="btn btn-outline-primary mt-2" name="tambah">Add</button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
              <div class="card mt-2 border-dark">
                <div class="card-header">Album Data</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Album Name</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $userid = $_SESSION['user-id'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE `user-id`='$userid'");
                                while($data = mysqli_fetch_array($sql)) {

                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['namaalbum'] ?></td>
                                <td><?php echo $data['deskripsi'] ?></td>
                                <td><?php echo $data['tanggalbuat'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['albumid'] ?>">
                                    Edit
                                    </button>

                                    
                                    <div class="modal fade" id="edit<?php echo $data['albumid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../config/aksi_album.php" method="POST">
                                                <input type="hidden" name="albumid" value="<?php echo $data['albumid']?>">
                                                <label class="form-label">Nama Album</label>
                                                <input type="text" name="namaalbum" value="<?php echo $data['namaalbum']?>" class="form-control" required>
                                                <label class="form-label">Deskripsi</label>
                                                <textarea class="form-control" name="deskripsi"  required><?php echo $data['deskripsi']?></textarea>

                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="edit" class="btn btn-outline-primary">Edit Data</button>
                                        </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['albumid'] ?>">
                                    Hapus
                                    </button>

                                    
                                    <div class="modal fade" id="hapus<?php echo $data['albumid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../config/aksi_album.php" method="POST">
                                                <input type="hidden" name="albumid" value="<?php echo $data['albumid']?>">
                                                Hapus Data <strong> <?php echo $data['namaalbum'] ?> </strong> ??
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="hapus" class="btn btn-outline-danger">Hapus Data</button>
                                        </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>


                                </td>
                            </tr>
                               <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


        <footer class="footer text-white text-center footercl fixed-bottom">
            <p>&copy; UKK RPL | YausyuAYSAUYSUA </p>
        </footer>
    <script type="text/javascript" src="../js/bootstrap.min.js"> </script>
</body>
</html>