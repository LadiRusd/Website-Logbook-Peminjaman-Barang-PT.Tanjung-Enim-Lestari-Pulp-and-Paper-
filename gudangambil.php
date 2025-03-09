<?php include 'header.php';
include('koneksi.php');
if ($_SESSION['admin']['level'] != "Staff") {
    echo "<script> alert('Anda Tidak Mempunyai Hak Untuk Mengakses Halaman Ini');</script>";
    echo "<script> location ='index.php';</script>";
}
?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ambil Barang Gudang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Ambil Barang Gudang</li>
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
                            <h3 class="card-title">Ambil Barang Gudang</h3>
                        </div>

                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>No Surat</label>
                                    <input type="text" required class="form-control" name="noqr" placeholder="No Surat">
                                </div>
                                <div class="form-group">
                                    <label>No RSP</label>
                                    <input type="text" required class="form-control" name="norsp" placeholder="No RSP">
                                </div>
                                <div class="form-group">
                                    <label>Peminjam</label>
                                    <input type="hidden" required class="form-control" name="idadmin" value="<?= $_SESSION['admin']['idadmin'] ?>" readonly>
                                    <input type="text" required class="form-control" name="peminjam" placeholder="Peminjam" value="<?= $_SESSION['admin']['nama'] ?>" readonly>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Ambil</label>
                                            <input type="date" required class="form-control" name="tanggal" value="<?= date('Y-m-d') ?>" placeholder="Tanggal Ambil">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Waktu Ambil</label>
                                            <input type="time" required class="form-control" name="waktu" value="<?= date('H:i') ?>" placeholder="Waktu Ambil">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Unit</label>
                                    <input type="text" required class="form-control" name="unit" placeholder="Unit" value="<?= $_SESSION['admin']['unit'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Teknisi</label>
                                    <input type="text" required class="form-control" name="teknisi" placeholder="Teknisi">
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input type="text" required class="form-control" name="lokasi" placeholder="Lokasi">
                                </div>
                                <br>
                                <table class="table table-bordered table-striped" id="tabelform">
                                    <tr>
                                        <td width="30%">
                                            <div class="form-group namabarangharga">
                                                <label class="mb-2">Nama Barang</label>
                                                <select name="namabarang[]" id="selectcari" data-width="100%" class="form-control namabarang" required>
                                                    <option value="Tidak Ada">Tidak Ada</option>
                                                    <?php $ambil = $koneksi->query("SELECT*FROM barang"); ?>
                                                    <?php while ($data = $ambil->fetch_assoc()) { ?>
                                                        <option value="<?= $data['namabarang'] ?>" data-idbarang="<?= $data['idbarang'] ?>" data-merekbarang="<?= $data['merekbarang'] ?>"><?= $data['namabarang'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group mb-3">
                                                <label class="mb-2">Merek Barang</label>
                                                <input type="hidden" name="idbarang[]" class="form-control idbarang">
                                                <input type="text" id="merekbarang" value="" name="merekbarang[]" oninput="check()" onchange="check()" class="form-control merekbarang" readonly required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group mb-3">
                                                <label class="mb-2">SN Barang</label>
                                                <input type="number" id="snbarang" value="" name="snbarang[]" oninput="check()" onchange="check()" class="form-control merekbarang" required>
                                            </div>
                                        </td>
                                        <td width="15%">
                                            <div class="form-group mb-3">
                                                <label class="mb-2">Jumlah</label>
                                                <input type="number" value="1" min="0" id="jumlah1" name="jumlah[]" oninput="check()" onchange="check()" class="form-control jumlah" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group mb-3">
                                                <button type="button" name="add" id="addkegiatan" class="btn btn-success" style="margin-top:30px">+</button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="card-footer">
                                <button type="submit" required class="btn btn-primary float-right pull-right" name="simpan">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </section>
</div>
<?php
if (isset($_POST['simpan'])) {
    $kode = date("Ymdhis");
    $noqr = $_POST['noqr'];
    $norsp = $_POST['norsp'];
    $idadmin = $_POST['idadmin'];
    $peminjam = $_POST['peminjam'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $unit = $_POST['unit'];
    $teknisi = $_POST['teknisi'];
    $lokasi = $_POST['lokasi'];
    $i = 0;
    foreach ($_POST['namabarang'] as $val) {
        $idbarang = $_POST['idbarang'][$i];
        $namabarang = $_POST['namabarang'][$i];
        $merekbarang = $_POST['merekbarang'][$i];
        $jumlah = $_POST['jumlah'][$i];
        $snbarang = $_POST['snbarang'][$i];
        $koneksi->query("INSERT INTO barangkeluar(kode,noqr,norsp,idadmin,peminjam,tanggal,waktu,unit,teknisi,lokasi,idbarang,namabarang,merekbarang,jumlah,snbarang)
            VALUES ('$kode','$noqr','$norsp','$idadmin','$peminjam','$tanggal','$waktu','$unit','$teknisi','$lokasi','$idbarang','$namabarang','$merekbarang','$jumlah','$snbarang')") or die(mysqli_error($koneksi));
        $koneksi->query("UPDATE barang SET stok=stok-'$jumlah' WHERE idbarang='$idbarang'") or die(mysqli_error($koneksi));
        $i++;
    }
    echo "<script> alert('Data Berhasil Di Simpan');</script>";
    echo "<script> location ='barangkeluardaftar.php';</script>";
}
?>
<?php include 'footer.php'; ?>
<script>
    var $submit = $('#btn_simpan');

    $(document).ready(function() {
        var i = 1;
        $('#addkegiatan').click(function() {

            i++;
            html = "";
            html += '<tr id="row' + i + '">' +
                '<td width="30%">' +
                '<div class="form-group namabarangharga">' +
                '<label class="mb-2">Nama Barang</label>' +
                '<input type="hidden" name="tipe[]" value="Barang">' +
                '<input type="hidden" name="keterangan[]" value="">' +
                '<select name="namabarang[]" class="form-control namabarang" required>' +
                '<option value="">Pilih Barang</option>' +
                '<?php $ambil = $koneksi->query("SELECT*FROM barang"); ?>' +
                '<?php while ($data = $ambil->fetch_assoc()) { ?>' +
                '<option value="<?= $data['namabarang'] ?>" data-idbarang="<?= $data['idbarang'] ?>" data-merekbarang="<?= $data['merekbarang'] ?>"><?= $data['namabarang'] ?></option>' +
                '<?php } ?>' +
                '</select>' +
                '</div>' +
                '</td>' +
                '<td>' +
                '<div class="form-group mb-3">' +
                '<label class="mb-2">Merek Barang</label>' +
                '<input type="hidden" name="idbarang[]" class="form-control idbarang">' +
                '<input type="text" id="merekbarang" name="merekbarang[]" oninput="check()" onchange="check()" class="form-control merekbarang" readonly required>' +
                '</div>' +
                '</td>' +
                '<td>' +
                '<div class="form-group mb-3">' +
                '<label class="mb-2">SN Barang</label>' +
                '<input type="number" id="snbarang" value="" name="snbarang[]" oninput="check()" onchange="check()"' + 'class="form-control merekbarang" required>' +
                '</div>' +
                '</td>' +
                '<td width="15%">' +
                '<div class="form-group mb-3">' +
                '<label class="mb-2">Jumlah</label>' +
                '<input type="number" value="1" min="0" id="jumlah' + i + '" name="jumlah[]" class="form-control jumlah" oninput="check()" onchange="check()" required>' +
                '</div>' +
                '</td>' +

                '<td>' +
                '<div class="form-group mb-3">' +
                '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove" style="margin-top:30px">X</button>' +
                '</div>' +
                '</td>' +


                '</tr>';

            $('#tabelform').append(html);
        });

    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
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
</script>