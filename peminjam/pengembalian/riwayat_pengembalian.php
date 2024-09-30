<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Buku</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Buku</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
            Daftar Riwayat pengembalian Buku
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Cover Buku</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Di Kembalikan</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = mysqli_query($koneksi,"SELECT *
                    FROM peminjaman
                    INNER JOIN user ON peminjaman.UserID = user.UserID
                    INNER JOIN buku ON peminjaman.BukuID = buku.BukuID
                    WHERE peminjaman.StatusPeminjaman = 'Sudah Di Kembalikan'
                    ORDER BY user.UserID")or die(mysqli_error($koneksi));
                    $nomor = 1;
                    while($data = mysqli_fetch_array($query)){
                    ?>
                <tr>
                    <th scope="row"><?php echo $nomor++;?></th>
                    <td>
                        <?php
                            if($data['Foto'] == ""){
                            ?>
                            <img src="../foto/foto_kosong.webp" width="100" class="img-fluid rounded" alt="">
                            <?php
                            }
                            else{
                            ?>
                            <img src="../foto/<?php echo $data['Foto'];?>" width="50" class="img-fluid rounded" alt="foto">
                        <?php
                        }
                        ?>
                    </td>
                    <td><?php echo $data['Judul'] ?></td>
                    <td><?php echo $data['TanggalPeminjaman'] ?></td>
                    <td><?php echo $data['TanggalPengembalian'] ?></td>
                    <td><?php echo $data['StatusPeminjaman'] ?></td>
                    
                </tr>
                <?php
            }
            ?>
                    </tbody>
                </table>
                <a href="?page=pengembalian" class="btn btn-danger mt-4">Kembali</a>
            </div>
            </div>
        </div>

    </section>
</div>
