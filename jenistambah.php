<?php include 'header.php';
include('koneksi.php');

?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 my-auto">
                    <h2>Tambah Jenis</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Jenis</li>
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
                                    <label>Nama Jenis</label>
                                    <input type="text" required class="form-control" name="namajenis" placeholder="Nama Jenis">
                                </div>
                                <div class="form-group">
                                    <button type="submit" required class="btn btn-primary float-right" name="tambah">Simpan</button>
                                </div>
                            </div>

                        </form>

                    </div>
                    <div class="col-md-6">

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<?php
if (isset($_POST['tambah'])) {
    $namajenis = $_POST["namajenis"];
    $koneksi->query("INSERT INTO jenis(namajenis)
		VALUES ('$namajenis')") or die(mysqli_error($koneksi));
    echo "<script> alert('Data Berhasil Di Simpan');</script>";
    echo "<script> location ='jenisdaftar.php';</script>";
}
?>
<?php include 'footer.php'; ?>