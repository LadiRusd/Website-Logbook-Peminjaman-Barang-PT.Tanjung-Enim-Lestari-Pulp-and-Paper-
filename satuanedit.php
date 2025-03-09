<?php include 'header.php';
include('koneksi.php');

$ambil = $koneksi->query("SELECT * FROM satuan WHERE idsatuan='$_GET[id]'");
$data = $ambil->fetch_assoc();
?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 my-auto">
                    <h2>Edit Satuan</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Satuan</li>
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
                                    <label>Nama Satuan</label>
                                    <input value="<?= $data['namasatuan'] ?>" type="text" required class="form-control" name="namasatuan" placeholder="Nama Satuan">
                                </div>
                                <div class="form-group">
                                    <button type="submit" required class="btn btn-primary float-right" name="tambah">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php

if (isset($_POST['tambah'])) {
    $koneksi->query("UPDATE satuan SET namasatuan='$_POST[namasatuan]' WHERE idsatuan='$_GET[id]'") or die(mysqli_error($koneksi));
    echo "<script> alert('Data Berhasil Di Simpan');</script>";
    echo "<script> location ='satuandaftar.php';</script>";
}
?>
</div>


<?php include 'footer.php'; ?>