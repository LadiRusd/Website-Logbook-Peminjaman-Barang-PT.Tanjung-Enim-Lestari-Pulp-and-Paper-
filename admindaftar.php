<?php include('header.php');

?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6 my-auto">
                    <h2>Daftar Admin</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Admin</li>
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
                            <a class="btn btn-primary mb-3" href="admintambah.php" role="button">Tambah Admin</a>
                            <div class="table-responsive">
                                <table id="tabel" class="table table-bordered table-hover">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        $idadmin = $_SESSION['admin']['idadmin'];
                                        ?>
                                        <?php $ambil = $koneksi->query("SELECT*FROM admin where idadmin != '$idadmin'"); ?>
                                        <?php while ($data = $ambil->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data['nama'] ?></td>
                                                <td><?= $data['email'] ?></td>
                                                <td>
                                                    <a href="adminedit.php?id=<?php echo $data['idadmin']; ?>" class="btn btn-success btn-sm m-1">Edit</a>
                                                    <a href="adminhapus.php?id=<?php echo $data['idadmin']; ?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Hapus</a>
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