<section class="section">
<h3> Kategori Buku</h3>
        <div class="card">
            <div class="card-header">
                
                <p class="text-subtitle text-muted">
                    <a href="?page=tambah_daftar_kategoribuku" class="btn btn-primary btn-sm " style="border-radius: 5px;">
                    <i class="mdi mdi-account-multiple-plus"></i>
                    </a>
                </p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi,"SELECT * FROM kategoribuku ")or die(mysql_error());
                            $nomor = 1;
                            while($data = mysqli_fetch_array($query)){
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $nomor++;?></th>
                                    <td><?php echo $data['NamaKategori'] ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="?page=edit_daftar_kategoribuku&KategoriID=<?php echo $data['KategoriID']?>"  class="btn btn-warning btn-sm" style="border-radius: 5px;" title="edit"><i class="mdi mdi-pencil-outline"></i></a>
                                            <a href="?page=delet_daftar_kategoribuku&KategoriID=<?php echo $data['KategoriID']?>" class="btn btn-danger btn-sm ms-1" style="border-radius: 5px;" title="hapus"><i class="mdi mdi-delete"></i></a>
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
</div>
