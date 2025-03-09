<?php include('header.php');
if (isset($_POST['submit'])) {
    $tanggalawal = $_POST['tanggalawal'];
    $tanggalakhir = $_POST['tanggalakhir'];
} else {
    $hariini = date('Y-m-d');
    $tanggalawal = date('Y-m-01', strtotime($hariini));
    $tanggalakhir = date('Y-m-t', strtotime($hariini));
}
?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6 my-auto">
                    <h2>Laporan Barang Masuk</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Barang Masuk</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Laporan Barang Masuk</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label class="mb-2">Tanggal Awal</label>
                                            <input type="date" class="form-control" name="tanggalawal" value="<?= $tanggalawal ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label class="mb-2">Tanggal Awal</label>
                                            <input type="date" class="form-control" name="tanggalakhir" value="<?= $tanggalakhir ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <button type="submit" name="submit" value="submit" class="btn btn-primary text-white" style="margin-top:30px">Cari</button>
                                            <a target="_blank" href="laporanbarangmasukcetak.php?tanggalawal=<?= $tanggalawal ?>&tanggalakhir=<?= $tanggalakhir ?>" class="btn btn-success text-white" style="margin-top:30px">Cetak</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="tabel">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th>No.</th>
                                            <th>No Surat</th>
                                            <th>Peminjam</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Nama Barang</th>
                                            <th>Stok</th>
                                            <th>Jenis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambildata = $koneksi->query("SELECT*FROM barangmasuk  WHERE (tanggal >= '$tanggalawal' and tanggal <= '$tanggalakhir') order by idbarangmasuk desc");
                                        $no = 1;
                                        while ($data = $ambildata->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?php echo $data['noqr'] ?></td>
                                                <td><?php echo $data['peminjam'] ?></td>
                                                <td><?php echo tanggal($data['tanggal']) ?></td>
                                                <td><?php echo $data['namabarang'] ?></td>
                                                <td><?php echo $data['jumlah'] ?></td>
                                                <td><?php echo $data['jenis'] ?></td>
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
<?php include('footer.php'); ?>