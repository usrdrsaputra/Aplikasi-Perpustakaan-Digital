<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Report peminjaman</h3>
                <p class="text-subtitle text-muted">
                <a href ="?page=periode_inventaris" class="btn btn-success">Periode Riport</a>
                </p>
                
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Report</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Report inventaris</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                data peminjaman buku
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                        <th scope="col">No</th>

                        <th scope="col">Tanggal peminjaman</th>
                        <th scope="col">Tanggal pengembalian</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori Buku</th>
                        <th scope="col" >penulis</th>
                        <th scope="col">penerbit</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                  $query = mysqli_query($koneksi, "SELECT * 
                  FROM buku 
                  INNER JOIN peminjaman ON buku.BukuID = peminjaman.BukuID 
                  WHERE Status = 'Di Pinjam'") 
                  or die(mysqli_error($koneksi));

                    $nomor = 1;
                    while($data = mysqli_fetch_array($query)){
                    ?>
                <tr>
                    <th scope="row"><?php echo $nomor++;?></th>
                    <td><?php echo $data['kondisi'] ?></td>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['Judul'] ?></td>
                    <td><?php echo $data['nama_jenis'] ?></td>
                    <td><?php echo $data['nama_ruang'] ?></td>
                    <td><?php echo $data['keterangan'] ?></td>
                    <td><?php echo date('d-M-Y', strtotime($data['tanggal_register']));?>

                    

                </tr>
                <?php
            }
            ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>