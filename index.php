<?php include('header.php');

$barang = $koneksi->query("SELECT*FROM barang");
$jumlahbarang = mysqli_num_rows($barang);

$admin = $koneksi->query("SELECT*FROM admin");
$jumlahadmin = mysqli_num_rows($admin);

$barangkeluar = $koneksi->query("SELECT*FROM barangkeluar");
$jumlahbarangkeluar = mysqli_num_rows($barangkeluar);

$barangmasuk = $koneksi->query("SELECT*FROM barangmasuk");
$jumlahbarangmasuk = mysqli_num_rows($barangmasuk);
?>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <center>
                    <img style="height: 200px;" src="assets/admin/welcome.jpg">
                </center>
                <center>
                    <h2 class="pb-2">Selamat Datang di Website TS_LoogBook TELPP</h2>
                </center>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Data Barang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahbarang ?>.</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-table fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Barang Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahbarangmasuk ?>.</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-downlaod fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Data Barang Keluar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahbarangkeluar ?>.</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-upload fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Data Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahadmin ?>.</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="tabel">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>No.</th>
                                    <th>No. QR</th>
                                    <th>Barang</th>
                                    <th>Peminjam</th>
                                    <th>Tanggal Pengeluaran</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ambildata = $koneksi->query("SELECT*FROM barangmasuk order by idbarangmasuk desc");
                                $no = 1;
                                while ($data = $ambildata->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?php echo $data['noqr'] ?></td>
                                        <td><?php echo $data['namabarang'] ?></td>
                                        <td><?php echo $data['peminjam'] ?></td>
                                        <td><?php echo tanggal($data['tanggalkeluar']) ?></td>
                                        <td><?php echo tanggal($data['tanggalmasuk']) ?></td>
                                        <td><?php echo $data['jumlah'] ?></td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>