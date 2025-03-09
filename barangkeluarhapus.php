<?php include('koneksi.php'); ?>
<?php
$koneksi->query("DELETE FROM barangkeluar WHERE idbarangkeluar='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='barangkeluardaftar.php';</script>";
