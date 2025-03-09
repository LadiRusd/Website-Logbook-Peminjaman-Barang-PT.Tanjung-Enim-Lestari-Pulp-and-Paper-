<?php include 'header.php';
include('koneksi.php');
$emailadmin = $_SESSION['admin']['email'];
$ambil = $koneksi->query("SELECT * FROM admin WHERE email='$emailadmin'");
$data = $ambil->fetch_assoc();
?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 my-auto">
                    <h2>Edit Profil</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Profil</li>
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
                                    <label>Nama</label>
                                    <input value="<?= $data['nama'] ?>" type="text" required class="form-control" name="nama" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input value="<?= $data['email'] ?>" type="text" required class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input value="<?= $data['password'] ?>" type="text" required class="form-control" name="password" placeholder="Password">
                                    <span class="text-danger">* Biarkan jika tidak ingin mengganti password</span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" required class="btn btn-primary float-right pull-right" name="simpan">Simpan</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['simpan'])) {
                            $koneksi->query("UPDATE admin SET nama='$_POST[nama]',email='$_POST[email]', password='$_POST[password]' WHERE email='$emailadmin'") or die(mysqli_error($koneksi));
                            $ambil = $koneksi->query("SELECT * FROM admin
        WHERE email='$_POST[email]' limit 1");
                            $akun = $ambil->fetch_assoc();
                            $_SESSION['admin'] = $akun;
                            echo "<script> alert('Data Berhasil Di Ubah');</script>";
                            echo "<script> location ='ubahprofil.php';</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include 'footer.php'; ?>