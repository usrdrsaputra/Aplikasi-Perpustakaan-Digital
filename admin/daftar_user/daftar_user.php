<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Data Petugas Atau Admin</h3>
                <p class="text-subtitle text-muted">
                    <a href="?page=tambah_daftar_user" class="btn btn-primary btn-sm " style="border-radius: 5px;">
                        <i class="mdi mdi-account-multiple-plus"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>




    <section class="section mt-2">
        <div class="card">
            <div class="card-header ">
                <h5 class="mt-2">Daftar User</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM user ORDER BY user.UserID ") or die(mysql_error());
                            $nomor = 1;
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $nomor++; ?></th>
                                    <td><?php echo $data['NamaLengkap'] ?></td>
                                    <td><?php echo $data['Email'] ?></td>
                                    <td><?php echo $data['Alamat'] ?></td>
                                    <td><?php echo $data['Role'] ?></td>
                                    <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="?page=edit_daftar_user&UserID=<?php echo $data['UserID'] ?>" class="btn btn-warning btn-sm" style="border-radius: 5px;" title="edit"><i class="mdi mdi-pencil-outline"></i></a>
                                        <a href="?page=delet_daftar_user&UserID=<?php echo $data['UserID'] ?>" class="btn btn-danger btn-sm ms-1" style="border-radius: 5px;" title="hapus"><i class="mdi mdi-delete"></i></a>
                                        <a href="?page=lihat_daftar_user&UserID=<?php echo $data['UserID'] ?>" class="btn btn-success btn-sm ms-1" style="border-radius: 5px;" title="lihat_daftar_user"><i class="mdi mdi-eye-outline"></i> </a>
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

   