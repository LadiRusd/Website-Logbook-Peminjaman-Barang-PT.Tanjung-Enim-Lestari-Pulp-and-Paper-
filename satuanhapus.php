<?php include('koneksi.php'); ?>
<?php
$koneksi->query("DELETE FROM satuan WHERE idsatuan='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='satuandaftar.php';</script>";
