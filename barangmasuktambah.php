<?php include 'header.php';
include('koneksi.php');

?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 my-auto">
                    <h2>Tambah Barang Masuk</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Barang Masuk</li>
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
                                    <label>Pilih Barang</label>
                                    <select name="noqr" data-live-search="true" data-width="100%" class="form-control noqr" onchange="myFunction(this)" required>
                                        <option value="Tidak Ada">Pilih</option>
                                        <?php $ambilbarang = $koneksi->query("SELECT*FROM barang"); ?>
                                        <?php while ($barang = $ambilbarang->fetch_assoc()) { ?>
                                            <option value="<?= $barang['noqr'] ?>" value="<?= $barang['namabarang'] ?>" data-idbarang="<?= $barang['idbarang'] ?>" data-namabarang="<?= $barang['namabarang'] ?>"><?= $barang['namabarang'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" value="" min="0" id="namabarang" name="namabarang" class="form-control" required>
                                    <input type="hidden" value="" min="0" id="idbarang" name="idbarang" class="form-control idbarang" required>
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Jumlah</label>
                                    <input type="number" value="1" min="0" id="jumlah" name="jumlah" oninput="check()" onchange="check()" class="form-control jumlah" required>
                                </div>
                                <div class="form-group">
                                    <label>Peminjam</label>
                                    <input type="text" required class="form-control" name="peminjam" placeholder="Nama Peminjam">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pengeluaran</label>
                                    <input type="date" required class="form-control" name="tanggalkeluar" value="<?= date('Y-m-d') ?>" placeholder="Tanggal Pengeluaran">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Masuk</label>
                                    <input type="date" required class="form-control" name="tanggalmasuk" value="<?= date('Y-m-d') ?>" placeholder="Tanggal Masuk">
                                </div>
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <textarea type="text" required class="form-control" name="catatan" rows="5" placeholder="Catatan"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" required class="btn btn-primary float-right pull-right" name="simpan" value="simpan">Simpan</button>
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
if (isset($_POST['simpan'])) {
    $idbarang = $_POST['idbarang'];
    $noqr = $_POST['noqr'];
    $peminjam = $_POST['peminjam'];
    $tanggalkeluar = $_POST['tanggalkeluar'];
    $tanggalmasuk = $_POST['tanggalmasuk'];
    $namabarang = $_POST['namabarang'];
    $jumlah = $_POST['jumlah'];
    $catatan = $_POST['catatan'];
    $koneksi->query("INSERT INTO barangmasuk(idbarang,noqr,peminjam,tanggalkeluar,tanggalmasuk,namabarang,jumlah,catatan)
            VALUES ('$idbarang','$noqr','$peminjam','$tanggalkeluar','$tanggalmasuk','$namabarang','$jumlah','$catatan')") or die(mysqli_error($koneksi));
    echo "<script> alert('Data Berhasil Di Simpan');</script>";
    echo "<script> location ='barangmasukdaftar.php';</script>";
}
?>
<?php include 'footer.php'; ?>
<script>
    $('#tabelform').on('change', '.namabarang', function() {
        var $select = $(this);
        var namabarang = $select.val();
        var $row = $(this).closest('tr');
        $row.find('.idbarang')
            .val(
                $(this).find(':selected').data('idbarang')
            );
        $row.find('.merekbarang')
            .val(
                $(this).find(':selected').data('merekbarang')
            );
    });

    function myFunction(sel) {
        var opt = sel.options[sel.selectedIndex];
        var namabarang = opt.dataset.namabarang
        var idbarang = opt.dataset.idbarang
        document.getElementById("namabarang").value = namabarang;
        document.getElementById("idbarang").value = idbarang;
    }
</script>