<?php include('header.php');
?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6 my-auto">
                    <h2>Daftar Barang</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Barang</li>
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
                            <a class="btn btn-primary mb-3" href="barangtambah.php" role="button">Tambah Barang</a>
                            <div class="table-responsive">
                                <table id="tabel" class="table table-bordered table-hover">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th>No.</th>
                                            <th>Barang</th>
                                            <th>Merek</th>
                                            <th>Stok</th>
                                            <th>Jenis</th>
                                            <th>Satuan</th>
                                            <th>Keterangan</th>
                                            <th>Foto Barang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $koneksi->query("UPDATE barang SET stok='0' WHERE stok<0") or die(mysqli_error($koneksi));
                                        $ambildata = $koneksi->query("SELECT*FROM barang order by idbarang desc");
                                        $no = 1;
                                        while ($data = $ambildata->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?php echo $data['namabarang'] ?></td>
                                                <td><?php echo $data['merekbarang'] ?></td>
                                                <td><?php echo $data['stok'] ?></td>
                                                <td><?php echo $data['jenisbarang'] ?></td>
                                                <td><?php echo $data['satuanbarang'] ?></td>
                                                <td><?php echo $data['keteranganproduk'] ?></td>
                                                <td><img width="150px" src="fotobarang/<?php echo $data['fotobarang'] ?>" style="border-radius:10px"></td>
                                                <td>
                                                    <a href="barangedit.php?idbarang=<?php echo $data['idbarang']; ?>" class="btn btn-success btn-sm m-1">Edit</a>
                                                    <a href="baranghapus.php?idbarang=<?php echo $data['idbarang']; ?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Hapus</a>
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
<?php include('footer.php'); ?>