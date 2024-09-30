<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data laporan buku</h3>
                <p class="text-subtitle text-muted">
                    <a href="laporan_buku/cetak_buku.php" class="btn btn-info btn-sm"  style="border-radius: 5px;" >
                    <i class="mdi mdi mdi-fax"></i>
                    </a>
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Laporan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan Buku</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Daftar Buku
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori Buku</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi,"SELECT *
                                FROM buku
                                INNER JOIN kategoribuku_relasi ON buku.BukuID = kategoribuku_relasi.BukuID
                                INNER JOIN kategoribuku ON kategoribuku_relasi.KategoriID = kategoribuku.KategoriID")or die(mysql_error());
                            $nomor = 1;
                            while($data = mysqli_fetch_array($query)){
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $nomor++;?></th>
                                    <td><?php echo $data['NamaKategori'] ?></td>
                                    <td><?php echo $data['Judul'] ?></td>
                                    <td><?php echo $data['Penulis'] ?></td>
                                    <td><?php echo $data['Penerbit'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
