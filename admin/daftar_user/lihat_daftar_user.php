<?php
$UserID = $_GET['UserID'];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE UserID='$UserID'");
$data = mysqli_fetch_array($query);
?>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Detail Data Pengguna</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST">
                        <div class="form-group">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" value="<?php echo $data ['NamaLengkap']?>" placeholder="Masukkan Nama Lengkap" required name="NamaLengkap" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" value="<?php echo $data ['Email']?>" placeholder="Masukkan Email" required name="Email" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" value="<?php echo $data ['Alamat']?>" placeholder="Masukkan Alamat Lengkap" required name="Alamat" disabled>
                        </div>
                        <?php if ($data['Role'] !== 'Peminjam') : ?>
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" value="<?php echo $data ['Username']?>" placeholder="Masukkan Username" required name="Username" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" value="<?php echo $data ['Password']?>" placeholder="Masukkan Password" required name="password" disabled>
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" value="<?php echo $data ['Role']?>" placeholder="Role" required name="Role" disabled>
                        </div>

                        <a href="?page=daftar_user" class="btn btn-danger mt-4">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
