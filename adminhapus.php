<?php include('koneksi.php');
session_start();
?>
<?php
$koneksi->query("DELETE FROM admin WHERE idadmin='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='admindaftar.php';</script>";
