<?php include 'header.php';

include('koneksi.php');
?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 my-auto">
                    <h2>Tambah Admin</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Admin</li>
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
                                    <input type="text" required class="form-control" name="nama" placeholder="Nama Admin">
                                </div>
                                <div class="form-group">
                                    <label>No. HP</label>
                                    <input type="text" required class="form-control" name="nohp" placeholder="No. HP">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat" placeholder="Alamat" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Unit</label>
                                    <input type="text" required class="form-control" name="unit" placeholder="Unit">
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" required class="form-control" name="jabatan" placeholder="Jabatan">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" required class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" required class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" required class="btn btn-primary float-right pull-right" name="tambah">Simpan</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>
<?php
if (isset($_POST['tambah'])) {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $level = $_POST["level"];
    $koneksi->query("INSERT INTO admin(nama, email, password)
		VALUES ('$nama', '$email','$password')") or die(mysqli_error($koneksi));
    echo "<script> alert('Data Berhasil Di Simpan');</script>";
    echo "<script> location ='admindaftar.php';</script>";
}
?>
</div>


<?php include 'footer.php'; ?>