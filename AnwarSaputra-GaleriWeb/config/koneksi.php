<?php
$hostname = 'localhost';
$userdb = 'root';
$passdb = '';
$namedb = 'ukk-galerifoto-anwarspt';

$koneksi = mysqli_connect($hostname,$userdb,$passdb,$namedb);

if ($koneksi) {
    echo "";
}else{
    echo "tidak terhubung";
}
?>