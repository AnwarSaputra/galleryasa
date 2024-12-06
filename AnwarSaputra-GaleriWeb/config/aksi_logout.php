<?php
session_start();
session_destroy();

echo "<script>
alert('Sudah Logout');
location.href='../index.php';
</script>";

?>