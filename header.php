<?php session_start();
date_default_timezone_set('Asia/Jakarta');
include 'koneksi.php';
if (!isset($_SESSION["admin"])) {
    echo "<script> location ='home.php';</script>";
}
$idadmin = $_SESSION['admin']['idadmin'];
$ambilprofil = $koneksi->query("SELECT * FROM admin WHERE idadmin='$idadmin'");
$profil = $ambilprofil->fetch_assoc();
function rupiah($angka)
{
    $hasilrupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasilrupiah;
}
function tanggal($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="foto/logo.png" rel="icon">
    <title>TEL ADMIN</title>
    <link href="asset/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="asset/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="asset/admin/css/ruang-admin.min.css" rel="stylesheet">
    <link href="asset/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <style>
        /* div.dt-buttons {
            float: right;
            position: absolute;
            bottom: -7;
        } */
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="foto/logo.png">
                </div>
                <div class="sidebar-brand-text mx-3">PT. TEL</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Menu Utama
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="barangdaftar.php">Data Barang</a>
                        <a class="collapse-item" href="jenisdaftar.php">Data Jenis</a>
                        <a class="collapse-item" href="satuandaftar.php">Data Satuan</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable2" aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseTable2" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="barangmasukdaftar.php">Barang Masuk</a>
                        <a class="collapse-item" href="barangkeluardaftar.php">Barang Keluar</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable3" aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-copy"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseTable3" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="barangmasuklaporan.php">Laporan Barang Masuk</a>
                        <a class="collapse-item" href="barangkeluarlaporan.php">Laporan Barang Keluar</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Lainnya
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable5" aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="collapseTable5" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="ubahprofil.php">Profil</a>
                        <a class="collapse-item" href="admindaftar.php">Data Admin</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">




                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="foto/user.png" style="max-width: 60px">
                                <span class="ml-2 d-none d-lg-inline text-white small"><?= $profil['nama'] ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="ubahprofil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->

                <!-- Container Fluid-->