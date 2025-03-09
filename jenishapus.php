<?php include('koneksi.php'); ?>
<?php
$koneksi->query("DELETE FROM jenis WHERE idjenis='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='jenisdaftar.php';</script>";
