<?php include 'header.php';

include('koneksi.php');
$ambil = $koneksi->query("SELECT * FROM admin WHERE idadmin='$_GET[id]'");
$data = $ambil->fetch_assoc();
?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 my-auto">
                    <h2>Edit Admin</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Admin</li>
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
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Admin</label>
                                    <input value="<?= $data['nama'] ?>" type="text" required class="form-control" name="nama" placeholder="Nama Admin">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input value="<?= $data['email'] ?>" type="text" required class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input value="<?= $data['password'] ?>" type="text" required class="form-control" name="password" placeholder="Password">
                                    <span class="text-danger">Kosongkan jika tidak ingin mengedit Password</span>
                                    <input value="<?= $data['password'] ?>" type="hidden" required class="form-control" name="passwordlama" placeholder="Password">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" required class="btn btn-primary float-right pull-right" name="simpan">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php

if (isset($_POST['simpan'])) {
    $password = $_POST['password'];
    if ($password != "") {
        $passwordfix = $_POST['password'];
    } else {
        $passwordfix = $_POST['passwordlama'];
    }
    $koneksi->query("UPDATE admin SET nama='$_POST[nama]', email='$_POST[email]', password='$password' WHERE idadmin='$_GET[id]'") or die(mysqli_error($koneksi));
    echo "<script> alert('Data Berhasil Di Simpan');</script>";
    echo "<script> location ='admindaftar.php';</script>";
}
?>
</div>


<?php include 'footer.php'; ?>