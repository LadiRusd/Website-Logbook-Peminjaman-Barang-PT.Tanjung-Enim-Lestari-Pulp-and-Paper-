<?php include('koneksi.php'); ?>
<?php
$koneksi->query("DELETE FROM barangmasuk WHERE idbarangmasuk='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='barangmasukdaftar.php';</script>";
