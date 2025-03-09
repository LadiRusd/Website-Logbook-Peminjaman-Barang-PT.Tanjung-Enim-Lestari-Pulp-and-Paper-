<?php include('header.php');

?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Gudang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Gudang</li>
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
                            <h3 class="card-title">Daftar Gudang</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead class="bg-info text-white">
                                    <tr>
                                        <th>No Surat</th>
                                        <th>Peminjam</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Merek Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Jenis</th>
                                        <th>Ambil Barang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td>11</td>
                                        <td>20</td>
                                        <td>20 Oktober 2022</td>
                                        <td>SANY</td>
                                        <td>Container</td>
                                        <td>22</td>
                                        <td>SANY</td>
                                        <td>TIDAK ADA</td>
                                        <!-- <td>
                                            <a href="barangedit.php" class="btn btn-success">Edit</a>
                                            <a href="baranghapus.php" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Hapus</a>
                                        </td> -->
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" href="gudangambil.php" role="button">Ambil Barang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('footer.php'); ?>