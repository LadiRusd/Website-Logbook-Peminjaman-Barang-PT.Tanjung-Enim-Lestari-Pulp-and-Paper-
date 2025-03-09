<?php include('header.php');

?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Barang</li>
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
                            <h3 class="card-title">Tambah Barang</h3>
                        </div>

                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>No. QR</label>
                                    <input type="text" required class="form-control" name="noqr" placeholder="No. QR">
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" required class="form-control" name="namabarang" placeholder="Nama Barang">
                                </div>
                                <div class="form-group">
                                    <label>Merek Barang</label>
                                    <input type="text" required class="form-control" name="merekbarang" placeholder="Merek Barang">
                                </div>
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="number" required class="form-control" name="stok" placeholder="Stok">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jenis Barang</label>
                                    <select class="form-control" required name="jenisbarang" required>
                                        <option value="">Pilih</option>
                                        <?php
                                        $ambiljenis = $koneksi->query("SELECT*FROM jenis");
                                        while ($jenis = $ambiljenis->fetch_assoc()) { ?>
                                            <option value="<?= $jenis['namajenis'] ?>"><?= $jenis['namajenis'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Satuan Barang</label>
                                    <select class="form-control" required name="satuanbarang" required>
                                        <option value="">Pilih</option>
                                        <?php
                                        $ambilsatuan = $koneksi->query("SELECT*FROM satuan");
                                        while ($satuan = $ambilsatuan->fetch_assoc()) { ?>
                                            <option value="<?= $satuan['namasatuan'] ?>"><?= $satuan['namasatuan'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan Barang</label>
                                    <textarea value="<?php echo $data['keteranganproduk'] ?>" class="form-control" required name="keteranganproduk" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Foto Barang</label>
                                    <input type="file" class="form-control" name="fotobarang" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" required class="btn btn-primary" name="simpan">Simpan</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['simpan'])) {
                            $namafoto = $_FILES['fotobarang']['name'];
                            $lokasifoto = $_FILES['fotobarang']['tmp_name'];
                            move_uploaded_file($lokasifoto, "fotobarang/" . $namafoto);
                            $noqr = $_POST["noqr"];
                            $namabarang = $_POST["namabarang"];
                            $merekbarang = $_POST["merekbarang"];
                            $stok = $_POST["stok"];
                            $jenisbarang = $_POST["jenisbarang"];
                            $satuanbarang = $_POST["satuanbarang"];
                            $keteranganproduk = $_POST["keteranganproduk"];
                            $koneksi->query("INSERT INTO barang(noqr,namabarang,merekbarang,stok,jenisbarang,satuanbarang,keteranganproduk,fotobarang)
		VALUES ('$noqr','$namabarang','$merekbarang','$stok','$jenisbarang','$satuanbarang','$keteranganproduk','$namafoto')");
                            echo "<script> alert('Data Berhasil Di Simpan');</script>";
                            echo "<script> location ='barangdaftar.php';</script>";
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('footer.php'); ?>