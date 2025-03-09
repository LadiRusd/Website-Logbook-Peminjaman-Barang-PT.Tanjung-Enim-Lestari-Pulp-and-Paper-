<html>
<title>LAPORAN BARNG MASUK PT. XYZ</title>
<style type="text/css">
    body {
        -webkit-print-color-adjust: exact;
        padding: 50px;
    }

    #table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
    }

    #table td,
    #table th {
        padding: 8px;
        padding-top: 15px;
    }

    #table tr {
        padding-top: 15px;
        padding-bottom: 15px;
    }

    #table tr:hover {
        background-color: #ddd;
    }

    #table th {
        padding-top: 15px;
        padding-bottom: 15px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }

    .biru {
        background-color: #06bbcc;
        color: white;
    }

    @page {
        size: auto;
        margin: 0;
        size: landscape;
    }
</style>
<?php
include('koneksi.php');
function rupiah($angka)
{
    $hasilrupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasilrupiah;
}
function tanggal($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
if (isset($_GET['tanggalawal'])) {
    $tanggalawal = $_GET['tanggalawal'];
    $tanggalakhir = $_GET['tanggalakhir'];
} else {
    $hariini = date('Y-m-d');
    $tanggalawal = date('Y-m-01', strtotime($hariini));
    $tanggalakhir = date('Y-m-t', strtotime($hariini));
}
?>

<body>
    <table width="100%">
        <tr>
            <td>
                <center>
                    <font size="5"><b>PT. XYZ</b></font><br>
                    <font size="2"><b>Website Inventori Persediaan Barang</b><br>Jl. Nungcik, Kota Palembang 30119<br>
                        Telp. (+628) 3245 67890
                    </font><br>
                </center>
            </td>
        </tr>
    </table>
    <br>
    <center>
        <h4>LAPORAN BARANG MASUK<br><?= tanggal($tanggalawal) . ' - ' . tanggal($tanggalakhir) ?></h4>
    </center>
    <br>
    <table class="table table-bordered table-striped" id="table" width="100%">
        <thead class="bg-info text-white">
            <tr>
                <th>No.</th>
                <th>No Surat</th>
                <th>Peminjam</th>
                <th>Tanggal Masuk</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Jenis</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $ambildata = $koneksi->query("SELECT*FROM barangmasuk  WHERE (tanggal >= '$tanggalawal' and tanggal <= '$tanggalakhir') order by idbarangmasuk desc");
            $no = 1;
            while ($data = $ambildata->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?php echo $data['noqr'] ?></td>
                    <td><?php echo $data['peminjam'] ?></td>
                    <td><?php echo tanggal($data['tanggal']) ?></td>
                    <td><?php echo $data['namabarang'] ?></td>
                    <td><?php echo $data['jumlah'] ?></td>
                    <td><?php echo $data['jenis'] ?></td>
                </tr>
                <?php $no++; ?>
            <?php } ?>
        </tbody>
    </table>
</body>
<script>
    window.print();
</script>

</html>