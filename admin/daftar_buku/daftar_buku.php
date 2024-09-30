<div class="page-heading">
    <div class="page-title">
        <h3>Tambahkan Daftar Buku Baru</h3>
        <p class="text-subtitle text-muted">
            <a href="?page=tambah_daftar_buku" class="btn btn-primary btn-sm " style="border-radius: 5px;">
            <i class="mdi mdi-account-multiple-plus"></i>
            </a>
        </p>
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
                            <th>Cover Buku</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Aksi</th>
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
                            <td scope="row"><?php echo $nomor++;?></td>
                            <td><?php echo $data['NamaKategori'] ?></td>
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
                            <td>
                                <div class="d-flex flex-column flex-md-row">
                                    <a href="?page=edit_daftar_buku&BukuID=<?php echo $data['BukuID']?>" class="btn btn-warning btn-sm" style="border-radius: 5px;" title="edit"><i class="mdi mdi-pencil-outline"></i></a>
                                    <a href="?page=delet_daftar_buku&BukuID=<?php echo $data['BukuID']?>" class="btn btn-danger btn-sm ms-1" style="border-radius: 5px;" title="hapus"><i class="mdi mdi-delete"></i></a>
                                    <a href="?page=lihat_ulasan_buku&BukuID=<?php echo $data['BukuID']?>" class="btn btn-success btn-sm ms-1" style="border-radius: 5px;" title="lihat_daftar_bukur"><i class="mdi mdi-eye-outline"></i> </a>
                                </div>
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
