<?php include('header.php');

?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 my-auto">
                    <h2>Daftar Barang Keluar</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Barang Keluar</li>
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
                            <a class="btn btn-primary mb-3" href="barangkeluartambah.php" role="button">Tambah Barang Keluar</a>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="tabel">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th>No.</th>
                                            <th>No. QR</th>
                                            <th>Barang</th>
                                            <th>Peminjam</th>
                                            <th>Tanggal Pengeluaran</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambildata = $koneksi->query("SELECT*FROM barangkeluar order by idbarangkeluar desc");
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
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#detail<?= $no ?>" class="btn btn-info btn-sm m-1">Detail</a>
                                                    <a href="barangkeluaredit.php?id=<?php echo $data['idbarangkeluar']; ?>" class="btn btn-success btn-sm m-1">Edit</a>
                                                    <a href="barangkeluarhapus.php?id=<?php echo $data['idbarangkeluar']; ?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Hapus</a>
                                                </td>
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
                            <th width="20%">Jumlah</th>
                            <th width="3%">:</th>
                            <td><?= $data['jumlah'] ?></td>
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