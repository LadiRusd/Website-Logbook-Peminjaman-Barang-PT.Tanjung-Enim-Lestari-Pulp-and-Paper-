<?php
include('header.php');
$hariini = date('Y-m-d');
if (!empty($_POST['tanggalawal'])) {
    $tanggalawal = $_POST['tanggalawal'];
} else {
    $tanggalawal = date('Y-m-01', strtotime($hariini));
}
if (!empty($_POST['tanggalakhir'])) {
    $tanggalakhir = $_POST['tanggalakhir'];
} else {
    $tanggalakhir = date('Y-m-t', strtotime($hariini));
}
?>
<style>
    .dataTables_filter {
        margin-bottom: 25px;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 my-auto">
                    <h2>Laporan Barang Keluar</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Barang Keluar</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <form method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Awal</label>
                                            <input type="date" name="tanggalawal" value="<?= $tanggalawal ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Akhir</label>
                                            <input type="date" name="tanggalakhir" value="<?= $tanggalakhir ?>" class="form-control" required>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" name="cari" value="cari" class="btn btn-primary btn-block" style="margin-top: 31px">Cari</button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover laporanbarangkeluar">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th>No.</th>
                                            <th>No. QR</th>
                                            <th>Barang</th>
                                            <th>Peminjam</th>
                                            <th>Tanggal Pengeluaran</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_POST['cari'])) {
                                            $ambildata = $koneksi->query("SELECT*FROM barangkeluar WHERE (tanggalkeluar >= '$tanggalawal' and tanggalkeluar <= '$tanggalakhir') order by idbarangkeluar desc");
                                        } else {
                                            $ambildata = $koneksi->query("SELECT*FROM barangkeluar order by idbarangkeluar desc");
                                        }
                                        $no = 1;
                                        while ($data = $ambildata->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?php echo $data['noqr'] ?></td>
                                                <td><?php echo $data['namabarang'] ?></td>
                                                <td><?php echo $data['peminjam'] ?></td>
                                                <td><?php echo tanggal($data['tanggalkeluar']) ?></td>
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
    </section>
</div>
<?php
$ambildata = $koneksi->query("SELECT*FROM barangkeluar order by idbarangkeluar desc");
$no = 1;
while ($data = $ambildata->fetch_assoc()) {
    $ambil = $koneksi->query("SELECT * FROM barangkeluar WHERE idbarangkeluar='$data[idbarangkeluar]'");
    $data = $ambil->fetch_assoc();
?>
    <div class="modal fade" id="detail<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <th width="20%">No. QR</th>
                            <th width="3%">:</th>
                            <td><?= $data['noqr'] ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Nama Barang</th>
                            <th width="3%">:</th>
                            <td><?= $data['namabarang'] ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Peminjam</th>
                            <th width="3%">:</th>
                            <td><?= $data['peminjam'] ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Tanggal Pengeluaran</th>
                            <th width="3%">:</th>
                            <td><?= tanggal($data['tanggalkeluar']) ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Tanggal Pengeluaran</th>
                            <th width="3%">:</th>
                            <td><?= tanggal($data['tanggalkeluar']) ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Jumlah</th>
                            <th width="3%">:</th>
                            <td><?= $data['jumlah'] ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Catatan</th>
                            <th width="3%">:</th>
                            <td><?= $data['catatan'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php
    $no++;
} ?>
<?php include('footer.php'); ?>