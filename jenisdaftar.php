<?php include('header.php');

?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 my-auto">
                    <h2>Daftar Jenis</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Jenis</li>
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
                            <a class="btn btn-primary mb-3" href="jenistambah.php" role="button">Tambah Jenis</a>
                            <div class="table-responsive">
                                <table id="tabel" class="table table-bordered table-hover">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jenis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php $ambil = $koneksi->query("SELECT*FROM jenis"); ?>
                                        <?php while ($data = $ambil->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data['namajenis'] ?></td>
                                                <td>
                                                    <a href="jenisedit.php?id=<?php echo $data['idjenis']; ?>" class="btn btn-success btn-sm m-1">Edit</a>
                                                    <a href="jenishapus.php?id=<?php echo $data['idjenis']; ?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Hapus</a>
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