<?php include 'koneksi.php';
$koneksi->query("DELETE FROM barang WHERE idbarang='$_GET[idbarang]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='barangdaftar.php';</script>";
