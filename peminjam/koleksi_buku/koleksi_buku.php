<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Perpustakaan Digital</h3>
                
            </div>
            <!-- <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?page=koleksi_buku">Koleksi Buku</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Buku</li>
                    </ol>
                </nav>
            </div> -->
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Koleksi Buku
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Cover Buku</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Ulasan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = mysqli_query($koneksi,"SELECT *
                    FROM buku
                    INNER JOIN koleksipribadi ON buku.BukuID = koleksipribadi.BukuID
                    INNER JOIN user ON koleksipribadi.UserID = user.UserID order by buku.BukuID, user.UserID")or die(mysqli_error($koneksi));
                    $nomor = 1;
                    while($data = mysqli_fetch_array($query)){
                        // Ambil ulasan buku berdasarkan BukuID
                        $BukuID = $data['BukuID'];
                        $query_ulasan = mysqli_query($koneksi, "SELECT * FROM ulasanbuku WHERE BukuID = '$BukuID'");
                        $ulasan = mysqli_fetch_assoc($query_ulasan);
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
                                <img src="../foto/<?php echo $data['Foto'];?>" width="auto" class="img-fluid rounded" alt="foto">
                                <?php
                                }
                                ?>
                            </td>
                    <td><?php echo $data['Judul'] ?></td>
                    <td><?php echo $data['Penulis'] ?></td>
                    <td><?php echo $data['Penerbit'] ?></td>
                    <td><?php echo isset($ulasan['Ulasan']) ? $ulasan['Ulasan'] : "Belum ada ulasan"; ?></td>
                    <td class="d-flex flex-column flex-md-row">
                        <a href="?page=delet_koleksi_buku&KoleksiID=<?php echo $data['KoleksiID']?>" class="btn btn-danger btn-sm" title="Delet"><i class="ti-trash menu-icon"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

    </section>
</div>
