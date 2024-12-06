<?php
session_start();
include 'koneksi.php';

$fotoid = $_POST['fotoid'];
$userid = $_SESSION['user-id'];
$isikomentar = $_POST['isi-komentar'];
$tanggalkomentar = date('Y-m-d');

$query = mysqli_query($koneksi, "INSERT INTO `komentar-foto` VALUES('','$fotoid','$userid','$isikomentar','$tanggalkomentar')");

echo "<script>
location.href='../admin/index.php';

</script>";
?>